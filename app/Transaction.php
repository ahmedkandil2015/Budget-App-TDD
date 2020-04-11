<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=['description','category_id','amount','user_id'];
    protected static function boot()
    {
        static::addGlobalScope('user',function ($query){
           $query->where('user_id',auth()->id());
        });

    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeByCategory($query,Category $category)
    {
        if ($category->exists){
            $query->where('category_id',$category->id);
        }
    }
}
