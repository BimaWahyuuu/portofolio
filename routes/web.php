<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;

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



// Route::get('/dashboard', function () {
//     return view('Dashboard');
// });

// Route::get('/mastersiswa', function () {
//     return view('MasterSiswa');
// });

//admin
Route::middleware('auth')->group(function (){
    Route::get('/adminn', function () {
        return view('adminn.app');
    });
    Route::get('/adminn', [DashboardController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('/mastersiswa/{id_siswa}/hapus',[SiswaController::class , 'hapus'])->name('mastersiswa.hapus')->middleware('auth','admin');
    Route::resource('/mastersiswa', SiswaController::class);
    Route::resource('/mastercontact', ContactController::class);
    Route::get('admin/mastercontact/{mastercontact}/newcontact', [ContactController::class, 'newcontact'])->name('mastercontact.newcontact');
    Route::post('admin/mastercontact/{mastercontact}/update', [ContactController::class, 'ubah'])->name('mastercontact.ubah');
    Route::get('admin/mastercontact/{mastercontact}/hapus', [ContactController::class, 'hapus'])->name('mastercontact.hapus');  
    Route::resource('/masterproject', ProjectController::class); 
    Route::get('admin/masterproject/{masterproject}/newproject', [ProjectController::class, 'newproject'])->name('masterproject.newproject'); 
    Route::post('admin/masterproject/{masterproject}/update', [ProjectController::class, 'ubah'])->name('masterproject.ubah'); 
    Route::get('admin/masterproject/{masterproject}/hapus', [ProjectController::class, 'hapus'])->name('masterproject.hapus');

    });

//guest
Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
    Route::get('/', function () {
        return view('home');
    });
    
    Route::get('/about', function () {
        return view('about');
    });
    
    Route::get('/project', function () {
        return view('project');
    });
    
    Route::get('/contact', function () {
        return view('contact');
    });
});




// Route::get('/masterproject', function () {
//     return view('MasterProject');
// });

// Route::get('/mastercontact', function () {
//     return view('MasterContact');
// });



 


