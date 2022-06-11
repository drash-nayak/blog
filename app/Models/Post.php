<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    { // Post::newQuery()->filter();
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

      /*  $query->when($filters['category'] ?? false, function ($query, $category) {
            $query
                ->whereExists(function ($query) use ($category){
                   $query->from('categories')
                    ->whereColumn('categories.id','posts.category_id')
                    ->where('categories.slug',$category);
                });
        });
        OR following code..
      */
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // where post has relationship with selected slug
            $query->whereHas('category',function ($query) use($category){
                $query->where('slug',$category);
            });
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            // where post has relationship with selected slug
            $query->whereHas('author',function ($query) use($author){
                $query->where('username',$author);
            });
        });
    }
/*
    Learning:
         Post::latest()->with(['category','author'])->get()
           OR:
        $category->posts->load(['category','author']); // with any relations
           OR following code:

        NOTE: if you don't want to include relational model with eager loading then

        Post::without('author')->first();
        OR
        Post::without(['author','user'])->first() or ....
    */
    protected $with = ['category','author'];
/*    public function getRouteKeyName()
    {
        return 'slug';
    }*/

    public $guarded = [];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
  /*
  // todo: OR
    public function user(){
        return $this->belongsTo(User::class);
    }*/
}
