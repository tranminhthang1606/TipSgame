<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;

    public function scopePublished($query)
    {

        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {

        $query->where('featured', true);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getReadingTime(){
        $time = round(str_word_count($this->body)/250);
        return ($time<1)?1:$time;
    }
    public function getThumbContent(){
        return Str::limit(strip_tags($this->body),150);
    }
    protected $casts = [
        'published_at' => 'datetime',
    ];
}