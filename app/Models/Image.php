<?php

namespace App\Models;

use App\Enums\ShowScopeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Image extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ["title", "scope"];
    protected $relations = ["properties", "comments"];
    protected $casts = ["scope" => ShowScopeEnum::class];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->performOnCollections('image')
            ->width(100)
            ->height(100);

        $this->addMediaConversion('index')
            ->performOnCollections('image')
            ->width(1080)
            ->height(1080);
    }
}
