<?php

namespace App\Http\Controllers;

use App\Http\biens\searchFormbien;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\searchFormRequest;
use App\Models\Type_vente;
use Illuminate\Http\Request;
use App\Models\Bien;
use App\Models\Quartier;

class PropertyController extends Controller
{
    public function index(SearchFormRequest $request)
    {
        $filters = $request->validated();

        $query = Bien::with('quartier')->orderBy('created_at', 'desc');

        if (!empty($filters['price'])) {
            $query->where('price', '<=', $filters['price']);
        }

        if (!empty($filters['surface'])) {
            $query->where('surface', '>=', $filters['surface']);
        }

        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($request->quartier)) {
            $query->where('quartier_id', $request->quartier);
            $filters['quartier'] = $request->quartier; // pour garder le champ sélectionné
        }

        return view('biens.index', [
            'biens' => $query->paginate(16),
            'input' => $filters,
            'quartiers' => Quartier::select('id', 'name')->get() // <-- ici on récupère bien les noms
        ]);        
    }



    public function show( Bien $property)
    {
        return view('biens.show', [
            'property' => $property
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function updateSoldStatus(Request $requet)
    {
        $bien = Bien::find($requet->id);
        if ($bien) {
            $bien->sold = $requet->sold;
            $bien->save();

            return response()->json(['message' => 'Statut mis à jour avec succès !']);
        }
        
        return response()->json(['message' => 'Bien non trouvé'], 404);
    }



    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'firstName' => 'nullable|string',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'firstName' => $request->firstName,
            'bodyMessage' => $request->message,
        ];

        Mail::send('emails.contact', $data, function($message) {
            $message->to('razafindratsotrypaulinaud77@gmail.com', 'Admin')
                    ->subject('Message du formulaire de contact');
        });        

        return back()->with('success', 'Votre message a été envoyé avec succès !');
    }

    public function sendcontact(Request $request, Bien $property)
    {
        $request->validate([
            'name' => 'required|string',
            'firstName' => 'nullable|string',
            'contact' => 'nullable|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'property' => $property,
            'name' => $request->name,
            'firstName' => $request->firstName,
            'contact' => $request->contact,
            'email' => $request->email,
            'bodyMessage' => $request->message,
        ];

        Mail::send('emails.property_contact', $data, function($message) {
            $message->to('razafindratsotrypaulinaud77@gmail.com', 'Admin')
                    ->subject('Nouveau message depuis une fiche bien');
        });

        return back()->with('success', 'Votre message a bien été envoyé !');
    }
}
