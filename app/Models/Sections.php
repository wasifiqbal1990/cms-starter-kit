<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sections extends Model Implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $fillable = ['title','description','short_description','extra','page_id','hashtag'];
    protected $casts = ['extra' => 'array'];

    /**
     * Get the comments for the blog post.
     */
    public function page()
    {
        return $this->belongsTo(Pages::class);
    }
}
