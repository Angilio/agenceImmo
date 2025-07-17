<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Models\Bien;
use App\Models\Quartier;
use App\Models\Type_bien;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('', [
//         'biens' => Bien::orderBy('created_at', 'desc')->get(),
//         'quartiers' => Quartier::pluck('name', 'id'),
//         'type_bien' => Type_bien::pluck('name', 'id')
//     ]);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('bien', App\Http\Controllers\BienController::class)->except('show');
});

Route::get('/property', [PropertyController::class,'index'])->name('property.index');
Route::get('/property/{property}',[PropertyController::class,'show'])->name('property.show');
Route::get('/contactez-nous',[PropertyController::class,'contact'])->name('contact');
Route::get('/about',[PropertyController::class,'about'])->name('about');
Route::post('/update-sold-status', [PropertyController::class, 'updateSoldStatus'])->name('updateSoldStatus');
Route::post('/contactez-nous', [PropertyController::class, 'send'])->name('contact.send');
Route::post('/biens/{property}/contact', [PropertyController::class, 'sendcontact'])->name('property.contact.send');
Route::get('/biens/carte', [App\Http\Controllers\CarteBienController::class, 'index'])->name('biens.carte');
Route::get('/api/biens', [App\Http\Controllers\CarteBienController::class, 'api'])->name('biens.api');
