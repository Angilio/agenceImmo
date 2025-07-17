<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    
    public function index() {

        // $roleSuAd = Role::create(['name' => 'SuperAdmin']);
        // $roleAd = Role::create(['name'=> 'Admin']);
        // $roleUs = Role::create(['name'=> 'user']);
        //$roleAdmin = User::find(1);
        //dump($roleAdmin);
        //$assign = $roleAdmin->assignRole('Admin'); 

        $biens = Bien::orderBy('created_at', 'desc')->limit(4)->get();
        return view('welcome', [ 'biens'=> $biens]);
    }
}
