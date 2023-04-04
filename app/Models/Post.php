<?php

namespace App\Models;

use App\QueryFilters\Even;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }


    public static function AllPosts(){
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([
                Even::class,
                Sort::class,
                MaxCount::class
            ])
            ->thenReturn()
            ->paginate(5);
    }
}
