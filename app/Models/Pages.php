<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description','short_description','extra'];
    protected $casts = [
        'extra' => 'array'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function sections()
    {
        return $this->hasMany(Sections::class);
    }
}
