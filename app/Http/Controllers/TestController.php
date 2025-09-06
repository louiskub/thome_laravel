<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleTagTranslation;
use App\Models\ArticleTranslation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    //
    function setLocale($locale)
    {
        if (! in_array($locale, ['en', 'th', 'cn'])) {
            abort(400);
        }
        Cookie::queue(Cookie::make('locale', $locale, 60 * 24 * 365));
        // Session::put('locale', $locale);
        return redirect()->back();
    }
}
