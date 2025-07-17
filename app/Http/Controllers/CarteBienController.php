<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Quartier;
use Illuminate\Http\Request;

class CarteBienController extends Controller
{
    public function index()
    {
        $quartiers = Quartier::with('biens')->get();
        return view('biens.carte', compact('quartiers'));
    }

    // BienController.php
    public function api()
    {
        $biens = Bien::all()->map(function ($bien) {
            return [
                'id' => $bien->id,
                'title' => $bien->title,
                'description' => $bien->description,
                'surface' => $bien->surface,
                'price' => $bien->price,
                'latitude' => $bien->latitude,
                'longitude' => $bien->longitude,
                'type_bien_id' => $bien->type_bien_id,
                'type_vente_id' => $bien->type_vente_id,
                'url' => route('property.show', $bien),
                'images' => collect(json_decode($bien->images))->map(function ($path) {
                    return ['path' => $path];
                }),
            ];
        });

        return response()->json($biens);
    }


}
