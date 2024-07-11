<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = "aboutus";
    public $timestamps = true;
    protected $guarded = ['id_aboutus'];
}
