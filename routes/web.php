<?php

use App\Events\SendMessageEvent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test' , function (){
   event(new SendMessageEvent('hello world'));
});

Route::get('/test' , function () {
    $data = [
        "RecipientEmail"=>"firasaljabi1111@gmail.com",
        "Subject"=>"hello",
        "Body"=>"hellobody"
    ];

     $res = Http::withOptions([
         'verify' => false
     ])
         ->withHeader('Api-Key' , 'vxUHubIc+WsMirIEbhoROFrmXogSadsMJu7FA9DuuJ2uFCrK0RLhMtx9AdKRxHQSCaYQnb/16cbT50UPpCBP3bHU7ie0128QzIi00lc+G1GZ4V8mRWzfNUpPTLfP2b4xEl0IbksbV5HJfNwu3Rkq0npJz6djICH7NTu0/In93QY=')
         ->post('https://62.72.3.104:7217/api/sender/textsend',$data);
     return $res->body();
});
