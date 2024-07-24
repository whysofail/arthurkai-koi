<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCollection extends Model
{
    use HasFactory;

    protected $table = "ourcollection";
    public $timestamps = true;
    protected $guarded = ['id_ourcollection'];

    public function koi()
    {
        return $this->belongsTo(Koi::class, 'koi_id', 'id');
    }
}
