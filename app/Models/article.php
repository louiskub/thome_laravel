<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'status'];
    // protected $visible = ['id', 'slug', 'status', 'translation'];
    protected $hidden = ['updated_at', 'translations', 'articleTags'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($article) {
            Storage::deleteDirectory('public/article/' . $article->slug); // ลบไดเรกทอรีที่เก็บภาพของบทความ
            $article->translations()->delete();
            $article->articleTags()->detach();
        });
    }

    public function translations()
    {
        return $this->hasMany(ArticleTranslation::class);
    }

    function articleTags()
    {
        return $this->belongsToMany(ArticleTag::class, 'article_with_tag');
    }

    public function translation($locale = null)
    {
        $locale = $locale ?? App::getLocale();
        $result = $this->translations->where('locale', $locale)->first();
        if (!$result) {
            $result = $this->translations->first();
        }
        return $result;
    }
}
