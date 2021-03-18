<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
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
