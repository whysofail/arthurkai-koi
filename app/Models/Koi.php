<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koi extends Model
{
    use HasFactory;

    protected $table = "koi";
    public $timestamps = true;
    protected $guarded = ['id_koi'];

    public function breeder()
    {
        return $this->belongsTo(Breeder::class);
    }

    public function variety()
    {
        return $this->belongsTo(Variety::class);
    }

    public function bloodline()
    {
        return $this->belongsTo(Bloodline::class);
    }

    public function seller()
    {
        return $this->belongsTo(Agent::class, 'seller_id');
    }

    public function handler()
    {
        return $this->belongsTo(Agent::class, 'handler_id');
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

}
