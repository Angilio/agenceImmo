<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperType_vente
 */
class Type_vente extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function bien() {
        return $this->hasMany(Bien::class);
    }
}
