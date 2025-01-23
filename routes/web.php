<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PlayListController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\DetailArticleController;
use App\Http\Controllers\FashionController;
use App\Http\Controllers\BeautyController;
use App\Http\Controllers\LifestyleController;
use App\Http\Controllers\TravelController;
use App\Models\Article;
use App\Models\Category;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Arahkan pengguna ke halaman login
})->name('logout');
//user dan admin
Route::get('/', [FrontendController::class, 'index'])->name('lanjut');
Route::get('/article/detail/{slug}', [FrontendController::class, 'detail'])->name('detail-article');
Route::get('/fashion',[FashionController::class,'index'])->name('fashion');
Route::get('/beauty',[BeautyController::class,'index'])->name('beauty');
Route::get('/lifestyle',[LifestyleController::class,'index'])->name('lifestyle');
Route::get('/travel',[TravelController::class,'index'])->name('travel');
Auth::routes();
//admin
Route::middleware(['auth', AdminMiddleware::class])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('playlist', PlayListController::class);
    Route::resource('meteri', MateriController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('iklan', IklanController::class);
    Route::get('/category/search',[CategoryController::class,'search'])->name('category.search');;
});
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/articles/search', [ArticleController::class, 'search'])->name('articles.search');
Route::get('/berita', [NewsController::class, 'index']);
Route::get('/get-started', function () {
    return view('landingpage');
});


// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('back.dashboard');
// });
// Route::get('/', function () {
//     return view('welcome');
// });