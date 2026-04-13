<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'icon', 'title_fr', 'title_en',
        'summary_fr', 'summary_en', 'body_fr', 'body_en', 'order',
    ];

    public function title(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_fr;
    }

    public function summary(): string
    {
        $locale = app()->getLocale();
        return $this->{"summary_{$locale}"} ?? $this->summary_fr;
    }

    public function body(): string
    {
        $locale = app()->getLocale();
        return $this->{"body_{$locale}"} ?? $this->body_fr;
    }
}
