<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    use HasFactory;

    protected $table = "breeder";
    public $timestamps = true;
    protected $guarded = ['id_breeder'];

    public function koi()
    {
        return $this->hasMany(Koi::class);
    }
}
