<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subcategory extends Model
{
    //
    use SoftDeletes;

       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
    ];

    /**
     * Get the category that the product belongs to.
     */
    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

            /**
     * Get the fishes for the category.
     */
    public function fishes()
    {
        return $this->hasMany(Fish::class);
    }
}
