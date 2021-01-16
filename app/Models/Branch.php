<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branches";

    protected $fillable = [
        'name'
    ];


    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'branch_id', 'id');
    }


}
