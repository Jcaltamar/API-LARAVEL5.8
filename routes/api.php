<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login','Auth\LoginController@login');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//clientes autenticados con credential

Route::middleware('client')->get('/clientsCredentials', function (Request $request) {
    return 'auth';
});

/**
 *
 *   width: 100%;
 *   height: 3.7rem;
 *   display: flex;
 *   justify-content: flex-end;
 *   align-items: flex-end;
 *   font-size: 1rem;
 *   color: #f1f1f1;
 *
 * Bearer
 * eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMyMmQxOTgxMTk2MjRhOTY3YmJlYTE1ZDBhMDgzZTk0ZjlkNmEwYjZlMzNiOGY1OGZlYjljYmYwMDY4ZThiYjRmMTM5M2MzZGE1NTcwYThiIn0.eyJhdWQiOiIxIiwianRpIjoiYzIyZDE5ODExOTYyNGE5NjdiYmVhMTVkMGEwODNlOTRmOWQ2YTBiNmUzM2I4ZjU4ZmViOWNiZjAwNjhlOGJiNGYxMzkzYzNkYTU1NzBhOGIiLCJpYXQiOjE1NDY2NDE0MzksIm5iZiI6MTU0NjY0MTQzOSwiZXhwIjoxNTc4MTc3NDM5LCJzdWIiOiIxMSIsInNjb3BlcyI6W119.BzVbdIHCBXuCwjnfBrZGURPh6-Nf9dPBxb7WKITqTq-usrnPwm2yLZVqgB8Hb3u0Yt4bj5EGnkpRm6NBTOVIYRP-KVHp49tupbpN3s_1sLAU5rCPLvVYILKrlLanV4hGbW2dPfxa_9KXy3UASPOG3V210AqFRhNfJRc7MIenLFvjKbdQhO_SRcQzrwdb_FegO3DLwbgmCOIFBoBi6mwMHaH_8JJKUInWZyToplHczp5-jzMf8OYJQJtYYrYIs7XAGc92TXQnCrKj-4NQeHDnGNV1TyJsmdzIvS3LL6yGCPCgXp2OLlg-Y0VC5zN4uZxP5Rsf4_Csof4O2Py56uraw5pE-4_-S83X7jWPIYHAilCjn83ZcPfQeW4R78tYMA7HTlqL80V1fXd13NVpcLL45k30PPEg0yU3yjxCHflKkMG2WpelFm3V9gYJO8lKvhP5BvXElDIf_CTVt3Kixgo-0IZSPfJ9gwLlPXGuW9rIDLxx8netQQsLFnrxJs7zXwbrjuhX5p5p7i5R1Og6Hw4ZYD6k7M99ldUXZP__2JtE-0BgP9iU_lo1vLj8VmzkX-CUrFh0TziwKJwoQOXY0EvRHcj8hisKufV07t2ySDgs3mIfuM0ueXs8yvpG_v3dicIv5EO7ymQoCPiP9FboLzGy70pEH2rR7nyOV83IcOhTcAQ
 */