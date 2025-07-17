<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienFormRequest;
use App\Models\Bien;
use App\Models\Quartier;
use App\Models\Type_bien;
use App\Models\Type_vente;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class BienController extends Controller
{
    public function index()
    {
        $quartier = Quartier::pluck('name', 'id');
        return view('admin.biens.index', [
            'biens' => Bien::orderBy('created_at', 'desc')->paginate(8),
            'quartiers' => $quartier,
            'type_bien' => Type_bien::pluck('name', 'id'),
            'type_vente' => Type_vente::pluck('name', 'id')
        ]);
        
    }

    public function create()
    {
        $bien = new Bien();
        $bien->fill([
            'Sold' => false,
        ]);
        return view('admin.biens.form', [
            'bien' => $bien,
            'quartiers' => Quartier::pluck('name', 'id'),
            'type_bien' => Type_bien::pluck('name', 'id'),
            'type_vente' => Type_vente::pluck('name', 'id')
        ]);
    }

    // public function store(BienFormRequest $request)
    // {
    //     $bien = new Bien();
    //     $bien = Bien::create($this->extractData($request, $bien));
    //     return to_route('admin.bien.index')->with('success', 'Le bien a bien été enregistré');
    // }

    public function store(BienFormRequest $request)
    {
        $bien = Bien::create($this->extractData($request, new Bien()));
        return to_route('admin.bien.index')->with('success', 'Le bien a bien été enregistré');
    }

   
    public function edit(Bien $bien)
    {
        return view('admin.biens.form', [
            'bien' => $bien,
            'quartiers' => Quartier::pluck('name', 'id'),
            'type_bien' => Type_bien::pluck('name', 'id'),
            'type_vente' => Type_vente::pluck('name', 'id')
        ]);
    }

    
    // public function update(BienFormRequest $request, Bien $bien)
    // {
    //     $bien->update($this->extractData($request, $bien));
    //     return to_route('admin.bien.index')->with('success', 'Le bien a été bien modifié');

    // }

    public function update(BienFormRequest $request, Bien $bien)
    {
        $bien->update($this->extractData($request, $bien));
        return to_route('admin.bien.index')->with('success', 'Le bien a bien été modifié');
    }

    
    public function destroy(Bien $bien)
    {
        $bien->delete();
        return to_route('admin.bien.index')->with('success', 'Le bien a bien été supprimer');
    }


    private function extractData(BienFormRequest $request, Bien $bien) 
    {
        $data = $request->validated();
    
        /** @var array|null $images */
        $images = $request->file('images');
    
        if ($images) {
            // Supprimer les anciennes images si modification
            if ($bien->images) {
                foreach (json_decode($bien->images) as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
    
            // Sauvegarde des nouvelles images
            $paths = [];
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $paths[] = $image->store('biens', 'public');
                }
            }
    
            // Stocker sous format JSON
            $data['images'] = json_encode($paths);
        }
    
        return $data;
    }
    
}

