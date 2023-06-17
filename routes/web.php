<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BooktableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home",[HomeController::class,"index"]);
Route::get('/aboutus', [AboutusController::class, 'index']);

Route::get('/menu', [MenuController::class, 'index']);

Route::get('/booktable', [ReservationController::class, 'index']);
// Route::post('/booktable', [ReservationController::class,'store'])->name('booktable.store');

Route::get('/booktable', function () {
    return view('booktable');
})->name('booktable');

Route::post('/booktable', [ReservationController::class, 'storetable'])->name('booktable.submit')->middleware('auth');



// Route::get('/userlogin', [UserController::class, 'showLoginForm']);
// Route::get('/usersignup', [UserController::class, 'showSignupForm']);
Route::get('/adminlogin', [AdminController::class, 'showAdminLoginForm'])->name('adminlogin');
// Route::get('/authenticate', 'App\Http\Controllers\AdminController@authenticate')->name('authenticate');


Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('authenticate');
//Route::get('/dashboard', [AdminController::class,"dashboardView"])->name('dashboard');
// Route::middleware(['admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('dashboard');
});

//Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/employee', function () {
        return view('employee');
    })->name('employee');
});


//Route::get('reservations', [AdminController::class, 'reservations'])->middleware('auth', 'admin');
Route::get('reservations', [ReservationController::class, 'reservations']);
Route::get('/deletereservation/{id}', [ReservationController::class, 'deletereservation'])->name('deletereservation');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::post('/updatereservation/{id}', [ReservationController::class, 'updatereservation'])->name('updatereservation');


Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('deleteemployee/{id}',[EmployeeController::class,'delete'])->name('delete');
Route::post('updateemployee/{id}', [EmployeeController::class, 'update'])->name('update');
Route::post('employee',[EmployeeController::class,'store'])->name('store');


Route::get('/logout', [AdminController::class,"logout"])->name('logout');

Route::get('/adminmenu', [AdminMenuController::class, 'printMenu'])->name('adminmenu');
Route::get('deletemenu/{id}',[AdminMenuController::class,'deleteMenu'])->name('deleteMenu');
Route::post('/adminmenu',[AdminMenuController::class,'storeMenu'])->name('storeMenu');

Route::get('/userlogin', [UserController::class,'showLoginForm'])->name('userlogin');
Route::post('/userlogin', [UserController::class,'login'])->name('userlogin.post');
Route::get('/usersignup', [UserController::class,'showSignupForm'])->name('usersignup');
Route::post('/usersignup', [UserController::class,'register'])->name('usersignup.post');
Route::post('/userlogout', [UserController::class,'logout'])->name('userlogout');

Route::get('/customer', [UserController::class,'index'])->name('customer.index');


Route::post('/addorder', [OrderController::class,'store'])->name('addorder');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('deleteorder/{id}',[OrderController::class,'deleteOrder'])->name('deleteOrder');

Route::get("/cart",[CartController::class,"index"])->name('cart');
Route::get("/cart",[CartController::class,"showCart"])->name('cart');
Route::get('/cart/{id}', [CartController::class,'destroy'])->name('cart.destroy');

Route::get('/profileedit', [ProfileController::class, 'edit'])->name('profileedit');
Route::post('/profileupdate', [ProfileController::class, 'update'])->name('profileupdate');

Route::get('/gallery', [GalleryController::class,'index'])->name('gallery.index');
Route::get('/deletegallery/{id}', [GalleryController::class,'deletegallery'])->name('deletegallery');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');

Route::get('/events', [EventController::class,'index'])->name('events.index');
Route::put('/events/{id}', [EventController::class, 'update'])->name('event.update');


// Registration routes
// Route::get('/usersignup', 'UserController@showSignupForm')->name('usersignup');
// Route::post('/usersignup', 'UserController@register')->name('register');
//Route::post('/register',[UserController::class,'register'])->name('register');



// Login routes
// Route::get('/userlogin', 'UserController@showLoginForm')->name('userlogin');
// Route::post('/userlogin', 'UserController@login')->name('login');


//Route::get('/employee', [EmployeeController::class, 'showEmployee']);


