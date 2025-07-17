<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperType_bien
 */
class Type_bien extends Model
{
    use HasFactory;
    protected $fillable =[
        'name'
    ];

    public function bien() {
        return $this->hasMany(Bien::class);
    }
}
