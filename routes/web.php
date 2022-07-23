<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index')->name('home');

//Admin Route

//Route::get('admin/dashboard','HomeController@index')->name('dashboard');
Route::group(['as'=>'admin.','prefix'=>'admin', 'namespace'=>'admin', 'middleware' => ['auth', 'admin']],function (){
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('products', ProductController::class);
    Route::resource('contact', ContactUsController::class);
    Route::resource('newsletter', NewsletterController::class);
    Route::resource('newsletter', NewsletterController::class);
    Route::resource('about', AboutController::class);
    Route::resource('membership', MembershipController::class);
    Route::resource('artisan', ArtisanController::class);
    Route::resource('artisanInfo', ArtisanInfoController::class);
    Route::resource('video', VideoController::class);
    Route::resource('fairTrade', FairTradeController::class);
    Route::resource('material', MaterialController::class);
    Route::resource('materialInfo', MaterialInfoController::class);
    Route::resource('blog', BlogController::class);

    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('password/edit', [ProfileController::class, 'passwordEdit'])->name('password.edit');
    Route::put('password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/artisans', 'HomeController@artisans')->name('artisans');
Route::get('/video', 'HomeController@video')->name('video');
Route::get('/fairTrade', 'HomeController@fairTrade')->name('fairTrade');
Route::get('/material', 'HomeController@material')->name('material');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/category', 'HomeController@category')->name('category');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact', 'ContactUsController@store')->name('user.contact');

Route::post('/productSearch', 'HomeController@search')->name('search');
Route::get('/productDetails/{id}', 'HomeController@productDetails')->name('product.details');
Route::get('/category/product/{id}', 'HomeController@categoryProduct')->name('category.product');
Route::get('/subcategory/product/{id}', 'HomeController@subcategoryProduct')->name('subcategory.product');
Route::get('/productList', 'HomeController@productList')->name('productList');
Route::get('/user', 'HomeController@user')->name('user');
Route::post('/newsletter', 'NewsletterController@store')->name('newsletter');

Route::get('blog', 'BlogController@blog')->name('blog');
Route::get('blog/{id}/details', 'BlogController@details')->name('blog.details');



Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    file_put_contents(storage_path('logs/laravel.log'), '');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});


Auth::routes();




