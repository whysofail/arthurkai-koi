<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HandlingAgent extends Model
{
    use HasFactory;

    protected $table = "handling_agent";
    public $timestamps = true;
    protected $guarded = ['id_handling_agent'];
}
