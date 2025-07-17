<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperQuartier
 */
class Quartier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function biens() {
        return $this->hasMany(Bien::class);
    }

}
