<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string|null $first_photo
 * @property-read bool $photo_exists
 */
class Koi extends Model
{
    use HasFactory;

    protected $table = "koi";
    public $timestamps = true;
    protected $guarded = ['id_koi'];

    protected $appends = ['first_photo', 'photo_exists'];

    public function getFirstPhotoAttribute(): ?string
    {
        if (!$this->photo) {
            return null;
        }

        $photos = explode('|', $this->photo);
        return $photos[0] ?? null;
    }

    public function getPhotoExistsAttribute(): bool
    {
        return $this->first_photo && file_exists(public_path('img/koi/photo/' . $this->first_photo));
    }

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
