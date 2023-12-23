<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = [
        'name'
    ];
    //
        //
    /**
     * Get the category that the product belongs to.
     */
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
