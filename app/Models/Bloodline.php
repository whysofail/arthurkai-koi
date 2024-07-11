<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodline extends Model
{
    use HasFactory;

    protected $table = "bloodline";
    public $timestamps = true;
    protected $guarded = ['id_bloodline'];
    public function koi()
    {
        return $this->hasMany(Koi::class);
    }
}
