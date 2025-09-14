@extends('layouts.layout_admin')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --bg-color: #f8f9fa; --card-bg: #ffffff; --text-color: #343a40;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --border-radius: 0.75rem; --padding: 1.5rem;
        }
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; background-color: var(--bg-color); color: var(--text-color); margin: 0; }
        .dashboard { max-width: 1200px; margin-top: 2rem; padding: 0 5rem; }
        h1 { margin-bottom: 2rem; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 1rem; }
        .card { background: var(--card-bg); padding: var(--padding); border-radius: var(--border-radius); box-shadow: var(--shadow); }
        .card-metric { text-align: center; }
        .card-metric .value { font-size: 2.25rem; font-weight: 700; color: #007bff; }
        .card-metric .label { font-size: 0.9rem; color: #6c757d; margin-top: 0.5rem; }
        .col-span-4 { grid-column: span 4; }
        .col-span-2 { grid-column: span 2; }
        h2 { margin-top: 0; font-size: 1.25rem; border-bottom: 1px solid #dee2e6; padding-bottom: 0.75rem; margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 0.75rem; border-bottom: 1px solid #e9ecef; }
        tr:last-child td { border-bottom: none; }
        td.count { font-weight: 600; text-align: right; }
        @media (max-width: 1024px) { .col-span-2 { grid-column: span 4; } }
        @media (max-width: 768px) { .dashboard-grid { grid-template-columns: repeat(2, 1fr); } .col-span-4 { grid-column: span 2; } }
    </style>
    <div class="dashboard container">
        <h1>Home Inspection Dashboard</h1>

        <div class="dashboard-grid">
            <div class="card card-metric">
                <div class="value">{{ number_format($keyMetrics['users']) }}</div>
                <div class="label">Active Users (30d)</div>
            </div>
            <div class="card card-metric">
                <div class="value">{{ number_format($keyMetrics['sessions']) }}</div>
                <div class="label">Sessions (30d)</div>
            </div>
            <div class="card card-metric">
                <div class="value">{{ $keyMetrics['engagementRate'] }}%</div>
                <div class="label">Engagement Rate (30d)</div>
            </div>
            <div class="card card-metric">
                <div class="value">{{ number_format($keyMetrics['conversions']) }}</div>
                <div class="label">Total Conversions (30d)</div>
            </div>
            <div class="card card-metric">
                <div class="value">{{ number_format($totalViewsToday) }}</div>
                <div class="label">Total View Today</div>
            </div>

            <div class="card col-span-4">
                <h2>Daily Active Users</h2>
                <canvas id="dailyUsersChart"></canvas>
            </div>

            <div class="card col-span-2">
                <h2>Top Traffic Sources</h2>
                <canvas id="trafficSourceChart" style="max-height: 300px;"></canvas>
            </div>
            
            <div class="card col-span-2">
                <h2>Top Conversion Events</h2>
                <table>
                    @foreach($conversions as $event)
                    <tr>
                        <td>{{ $event['name'] }}</td>
                        <td class="count">{{ number_format($event['count']) }}</td>
                    </tr>
                    {{-- @empty
                    <tr><td>No conversion data.</td></tr> --}}
                    @endforeach
                </table>
            </div>
            
            <div class="card col-span-4">
                <h2>Top Articles by Views</h2>
                 <table>
                    @forelse($topPages as $page)
                    <tr>
                        <td><a href="{{ $page['title'] }}">{{$page['title']}}</a></td>
                        
                        <td class="count">{{ number_format($page['views']) }}</td>
                    </tr>
                    @empty
                    <tr><td>No page data.</td></tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

<script>
    const dailyUsersData = @json($dailyUsers);
    const trafficSourceData = @json($trafficSources);

    // 1. Daily Users Chart (Line)
    new Chart(document.getElementById('dailyUsersChart'), {
        type: 'line',
        data: {
            labels: dailyUsersData.labels,
            datasets: [{
                label: 'Active Users', data: dailyUsersData.values,
                borderColor: 'rgb(54, 162, 235)', backgroundColor: 'rgba(54, 162, 235, 0.1)',
                fill: true, tension: 0.3
            }]
        },
        options: { scales: { y: { beginAtZero: true } }, plugins: { legend: { display: false } } }
    });

    // 2. Traffic Source Chart (Doughnut)
    new Chart(document.getElementById('trafficSourceChart'), {
        type: 'doughnut',
        data: {
            labels: trafficSourceData.labels,
            datasets: [{
                label: 'Sessions', data: trafficSourceData.values,
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6c757d'],
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'right' } } }
    });
</script>
@endsection