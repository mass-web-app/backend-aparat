<?php




//region route for auth

Route::group(['middleware'=>'throttle'],function(){
    Route::post('/login',[
        \Laravel\Passport\Http\Controllers\AccessTokenController::class,
        'issueToken'
    ])->name('auth.login');

});

Route::post('/register',[
    \App\Http\Controllers\AuthController::class,
    'register'
])->name('auth.register');


//endregion
