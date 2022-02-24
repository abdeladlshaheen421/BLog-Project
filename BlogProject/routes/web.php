<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
Route::middleware('auth')->group(function () {
    Route::get('/',[PostController::class,'index'])->name('posts.index');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts',[PostController::class,'store'])->name('posts.store');

    Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update');

    Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
    
});
Auth::routes();

//github
Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.login');
 
Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();
    $user=User::where('provider_id',$githubUser->id)->first();
        // $user = User::find($githubUser->email);
        if ($user) {
        $user->update([
            'remember_token' => $githubUser->token,
        ]);
    } else {
        $user = User::create([
            'provider_id' => $githubUser->id,
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,    
            'remember_token' => $githubUser->token,
        ]);
    }


    Auth::login($user);
    return redirect()->route('posts.index');
    // $user->token
});
//ggooogle
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');
 
Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();
    $user=User::where('provider_id',$googleUser->id)->first();
    
    if ($user) {
        $user->update([
            'remember_token' => $googleUser->token,
        ]);
    } else {
        $user = User::create([
            'provider_id' => $googleUser->id,
            'name' => $googleUser->name,
            'email' => $googleUser->email,    
            'remember_token' => $googleUser->token,
        ]);
    }
    Auth::login($user);
    return redirect()->route('posts.index');
    // $user->token
});