<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variety extends Model
{
    use HasFactory;

    protected $table = "variety";
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $fillable = ['name','code'];

    public function koi()
    {
        return $this->hasMany(Koi::class);
    }
}
