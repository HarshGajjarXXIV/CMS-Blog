<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function scopeSearch($query, $key, $id) {
        if($id != null)
        {
            return $query->where('title', 'like', '%'.$key.'%')
            ->orWhere('category_id', 'like', '%'.$id.'%')
            ->orWhere('posted_by', 'like', '%'.$key.'%')
            ->orWhere('created_at', 'like', '%'.$key.'%');
        }
        else
        {
            return $query->where('title', 'like', '%'.$key.'%')
            ->orWhere('posted_by', 'like', '%'.$key.'%')
            ->orWhere('created_at', 'like', '%'.$key.'%');
        }
    }
}
