<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'slug', 'title_fr', 'title_en', 'excerpt_fr', 'excerpt_en',
        'body_fr', 'body_en', 'tags', 'published', 'published_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function title(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_fr;
    }

    public function excerpt(): string
    {
        $locale = app()->getLocale();
        return $this->{"excerpt_{$locale}"} ?? $this->excerpt_fr;
    }

    public function body(): string
    {
        $locale = app()->getLocale();
        return $this->{"body_{$locale}"} ?? $this->body_fr;
    }

    public static function published()
    {
        return static::where('published', true)->orderByDesc('published_at');
    }
}
