<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'street',
        'nr',
        'postal_code',
        'province',
        'image',
        'user_id',
    ];

        /**
     * Get the fishes for the category.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
