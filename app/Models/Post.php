<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'image',
        'slug',
        'published_at',
        'featured',
        'user_id'
    ];

    public function scopePublished($query)
    {

        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {

        $query->where('featured', true);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getReadingTime()
    {
        $time = round(str_word_count($this->body) / 250);
        return ($time < 1) ? 1 : $time;
    }
    public function getThumbContent()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }
    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('category', function ($query) use($category){
            $query->where('slug', Str::slug($category));
        });
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }
    protected $casts = [
        'published_at' => 'datetime',
    ];
}