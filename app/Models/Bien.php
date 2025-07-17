<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Str;

/**
 * @mixin IdeHelperBien
 */
class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'Description',
        'Surface',
        'price',
        'Sold',
        'quartier_id',
        'type_bien_id',
        'images',
        'type_vente_id',
        'latitude', 
        'longitude',
    ];

    public function type_bien() {
        return $this->belongsTo(Type_bien::class);
    }

    public function type_vente() {
        return $this->belongsTo(Type_vente::class);
    }

    public function quartier() {
        return $this->belongsTo(Quartier::class);
    }

    public function imageUrl():string {
        return Storage::disk('public')->url($this->image);
    }

    protected $casts = [
        'images' => 'array',
    ];
    

    /*public function getSlug():string {
        return Str::slug($this->title);
    }*/
}
