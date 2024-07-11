<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = "agent";
    public $timestamps = true;
    protected $guarded = ['id_agent'];

    public function soldKoi()
    {
        return $this->hasMany(Koi::class, 'seller_id');
    }

    public function handledKoi()
    {
        return $this->hasMany(Koi::class, 'handler_id');
    }
}
