<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ["image_id", "name"];

    protected $relations = ["image"];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
