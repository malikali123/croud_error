<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Transfer extends Model
{
    use Notifiable;

    protected $table = "transfers";
    protected $guarded = [];



    public function branch()
    {
        return $this->belongsTo('App\Models\Branch', 'branch_id', 'id');
    }
}
