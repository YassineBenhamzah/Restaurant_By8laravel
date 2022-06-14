<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    protected $fillable = ["name" , "address"];
    public function Sales(){
        return $this->hasMany(Sales::class);
    }
}
