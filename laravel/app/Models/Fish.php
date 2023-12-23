<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fish extends Model
{
    //
    use SoftDeletes;

    protected $table = 'fishes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'size',
        'detail',
        'birthdate',
        'sex',
        'image',
        'category_id',
        'subcategory_id',
        'user_id',
    ];

    


    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory', 'subcategory_id')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id')->withTrashed();
    }



    public function bid()
    {
        return $this->hasOne(Bid::class);
    }

}
