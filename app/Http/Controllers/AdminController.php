<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleTranslation;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\DimensionOrderBy;
use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\Filter\InListFilter;
use Google\Analytics\Data\V1beta\FilterExpression;

use App\Models\User;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;

class AdminController extends Controller
{
    private $socialEvents = [
        'facebook_click',
        'ig_click',
        'line_click',
        'call_click'
    ];
    private $client;
    private $propertyId;

    //
    function index()
    {
        $article = Article::where('id', 1)->first();
        $translation = $article->translation(); // ได้ title/content ตามภาษา
        return view('admin.index', ['translation' => $translation]);
    }

    public function upload_image(Request $request)
    {
        try {
            if (!$request->hasFile('image')) {
                return response()->json(['message' => 'No image file provided'], 400);
            }
            $imageFile = $request->file('image');
            $fileName = md5_file($imageFile->getRealPath());
            $fileExtension = $imageFile->getClientOriginalExtension() ?? 'jpg';
            Storage::putFileAs('public/temp_uploads/', $imageFile, $fileName . '.' . $fileExtension);
            return response("/storage/temp_uploads/$fileName" . '.' . $fileExtension, 200)
                ->header('Content-Type', 'text/plain');
            // $fullPath = storage_path('app/public/temp_uploads/' . $fileName . '.' . $imageFile->getClientOriginalExtension());
            // Storage::disk('public')->makeDirectory('temp_uploads');

            // $img = Image::make($imageFile->getRealPath());
            // $img->resize(1200, null, function ($constraint) {
            //     $constraint->aspectRatio();
            //     $constraint->upsize();
            // });

            // $img->save($fullPath, 90);

        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to upload image: ' . $e->getMessage()], 500);
        }
    }
    // public function showDashboard()
    // {
    //     $propertyId = env('GA4_PROPERTY_ID');
    //     $client = new BetaAnalyticsDataClient();

    //     // ดึงข้อมูลจำนวนผู้ใช้รายวัน
    //     $usersResponse = $client->runReport([
    //         'property' => 'properties/' . $propertyId,
    //         'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
    //         'dimensions' => [new Dimension(['name' => 'date'])],
    //         'metrics' => [new Metric(['name' => 'activeUsers'])],
    //         'orderBys' => [new OrderBy(['dimension' => ['dimension_name' => 'date'], 'desc' => false])] // เรียงตามวันที่
    //     ]);

    //     // ดึงข้อมูลจยอดดูแต่ละหน้า
    //     $pagesResponse = $client->runReport([
    //         'property' => 'properties/' . $propertyId,
    //         'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
    //         'dimensions' => [
    //             new Dimension(['name' => 'pageTitle']),
    //             new Dimension(['name' => 'pagePath']),
    //         ],
    //         'metrics' => [new Metric(['name' => 'screenPageViews'])],
    //         'orderBys' => [new OrderBy(['metric' => ['metric_name' => 'screenPageViews'], 'desc' => true])], // เรียงตามยอดวิว
    //         'limit' => 10 // เอาแค่ 10 อันดับแรก
    //     ]);


    //     // จัดเรียงข้อมูลสำหรับ Chart.js
    //     $chartData = ['labels' => [], 'values' => []];
    //     foreach ($usersResponse->getRows() as $row) {
    //         $date = \DateTime::createFromFormat('Ymd', $row->getDimensionValues()[0]->getValue());
    //         $chartData['labels'][] = $date->format('d M');
    //         $chartData['values'][] = (int) $row->getMetricValues()[0]->getValue();
    //     }

    //     $topPages = [];
    //     foreach ($pagesResponse->getRows() as $row) {
    //         $topPages[] = [
    //             'title' => $row->getDimensionValues()[0]->getValue(),
    //             'url' => $row->getDimensionValues()[1]->getValue(),
    //             'views' => (int) $row->getMetricValues()[0]->getValue(),
    //         ];
    //     }

    //     return view('admin.dashboard', ['chartData' => $chartData]);
    // }

    public function __construct()
    {
        $this->propertyId = env('GA4_PROPERTY_ID');
        $this->client = new BetaAnalyticsDataClient();
    }

    public function showDashboard()
    {
        // ใช้ Cache เพื่อไม่ให้ยิง API บ่อยเกินไป ลดการโหลดและป้องกัน API Quota เต็ม
        $analyticsData = Cache::remember('analytics_data', now()->addHours(1), function () {
            return [
                'keyMetrics' => $this->fetchKeyMetrics(),
                'dailyUsers' => $this->fetchDailyUsers(),
                'topPages' => $this->fetchTopPages(),
                'trafficSources' => $this->fetchTrafficSources(),
                'conversions' => $this->fetchConversions(),
                'buttonClicks' => $this->fetchButtonClicks(),
                'totalViewsToday' => $this->fetchTotalViewsToday(),
            ];
        });

        return view('admin.dashboard', $analyticsData);
    }

    private function fetchKeyMetrics()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
            'metrics' => [
                new Metric(['name' => 'activeUsers']),
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'engagementRate']),
                new Metric(['name' => 'conversions']),
            ],
        ]);

        $row = $response->getRows()[0] ?? null;
        return [
            'users' => $row ? $row->getMetricValues()[0]->getValue() : 0,
            'sessions' => $row ? $row->getMetricValues()[1]->getValue() : 0,
            'engagementRate' => $row ? number_format((float)$row->getMetricValues()[2]->getValue() * 100, 2) : 0,
            'conversions' => $row ? $row->getMetricValues()[3]->getValue() : 0,
        ];
    }

    private function fetchDailyUsers()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'date'])],
            'metrics' => [new Metric(['name' => 'activeUsers'])],
            'orderBys' => [
                new OrderBy([
                    'dimension' => new DimensionOrderBy([
                        'dimension_name' => 'date'
                    ])
                ])
            ],
        ]);

        $chartData = ['labels' => [], 'values' => []];
        foreach ($response->getRows() as $row) {
            $date = \DateTime::createFromFormat('Ymd', $row->getDimensionValues()[0]->getValue());
            $chartData['labels'][] = $date->format('d M');
            $chartData['values'][] = (int) $row->getMetricValues()[0]->getValue();
        }
        return $chartData;
    }

    private function fetchTopPages()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'pagePath'])],
            'metrics' => [new Metric(['name' => 'screenPageViews'])],
            'orderBys' => [
                new OrderBy([
                    'metric' => new MetricOrderBy([
                        'metric_name' => 'screenPageViews'
                    ]),
                    'desc' => true
                ])
            ],
            // 'dimensionFilter' => new FilterExpression([
            //     'filter' => new Filter([
            //         'field_name' => 'pagePath',
            //         'in_list_filter' => new InListFilter([
            //             'values' => ['/article', '/privilege', '/review']
            //         ])
            //     ])
            // ]),
            'limit' => 10
        ]);

        $pages = [];
        foreach ($response->getRows() as $row) {
            $pages[] = [
                'title' => $row->getDimensionValues()[0]->getValue(),
                'views' => (int) $row->getMetricValues()[0]->getValue(),
            ];
        }
        return $pages;
    }

    private function fetchTotalViewsToday()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => 'today', 'end_date' => 'today'])],
            'metrics' => [new Metric(['name' => 'screenPageViews'])],
        ]);

        $totalViews = 0;
        // เมื่อไม่ระบุ Dimension ผลลัพธ์ที่ได้จะมีแค่แถวเดียว คือยอดรวมทั้งหมด
        if ($response->getRowCount() > 0) {
            $row = $response->getRows()[0];
            $totalViews = (int) $row->getMetricValues()[0]->getValue();
        }

        return $totalViews;
    }



    private function fetchTrafficSources()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'sessionDefaultChannelGroup'])],
            'metrics' => [new Metric(['name' => 'sessions'])],
            'orderBys' => [new OrderBy([
                'metric' => new MetricOrderBy([
                    'metric_name' => 'sessions'
                ]),
                'desc' => true
            ])],
        ]);

        $sourceData = ['labels' => [], 'values' => []];
        foreach ($response->getRows() as $row) {
            $sourceData['labels'][] = $row->getDimensionValues()[0]->getValue();
            $sourceData['values'][] = (int) $row->getMetricValues()[0]->getValue();
        }
        return $sourceData;
    }

    private function fetchConversions()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'eventName'])],
            'metrics' => [new Metric(['name' => 'conversions'])],
            'orderBys' => [new OrderBy(['metric' => new MetricOrderBy(['metric_name' => 'conversions']), 'desc' => true])],
            'dimensionFilter' => new FilterExpression([
                'filter' => new Filter([
                    'field_name' => 'eventName',
                    'in_list_filter' => new InListFilter([
                        'values' => $this->socialEvents,
                    ])
                ])
            ])
        ]);

        $conversions = [];
        foreach ($response->getRows() as $row) {
            if ($row->getMetricValues()[0]->getValue() > 0) {
                $conversions[] = [
                    'name' => $row->getDimensionValues()[0]->getValue(),
                    'count' => (int) $row->getMetricValues()[0]->getValue(),
                ];
            }
        }
        return $conversions;
    }

    private function fetchButtonClicks()
    {
        $response = $this->client->runReport([
            'property' => 'properties/' . $this->propertyId,
            'dateRanges' => [new DateRange(['start_date' => '30daysAgo', 'end_date' => 'today'])],
            'dimensions' => [new Dimension(['name' => 'eventName'])],
            'metrics' => [new Metric(['name' => 'eventCount'])],

            'dimensionFilter' => new FilterExpression([
                'filter' => new Filter([
                    'field_name' => 'eventName',
                    'in_list_filter' => new InListFilter([
                        'values' => $this->socialEvents,
                    ])
                ])
            ])
        ]);

        $buttonClicks = [];
        foreach ($response->getRows() as $row) {
            $buttonClicks[] = [
                'name' => $row->getDimensionValues()[0]->getValue(),
                'count' => (int) $row->getMetricValues()[0]->getValue(),
            ];
        }

        return $buttonClicks;
    }
}
