<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{
    use Sluggable;
    use SluggableScopeHelpers;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }
    // protected $sluggable = [
    //     'source' => 'title',
    //     'save_to' => 'slug',
    //     'onUpdate' => true
    // ];
    protected $fillable = [
        'title', 'content', 'user_id', 'category_id', 'photo_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
