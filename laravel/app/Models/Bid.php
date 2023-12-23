<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bid extends Model
{
    //
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $casts = [
        'bidders_id' => 'array'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fish_id',
        'bid',
        'highest_bidder',
        'bidders_id',
        'started_at',
        'ended_at',
        'status_id',
        'seller_id',
    ];

          /**
     * Get the roles of users.
     */
    public function statuses()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

              /**
     * Get the roles of users.
     */
    public function fish()
    {
        return $this->belongsTo('App\Fish', 'fish_id');
    }
}