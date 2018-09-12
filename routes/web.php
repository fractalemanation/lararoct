<?php

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
	/*App\Jobs\SendMessage::withChain([
		new App\Jobs\PrepareJob('Prepare...'),
		new App\Jobs\PublishJob('Publish!')
	])->dispatch("Start Job");*///withChain - разбивает на массив и если не выполняется первое условие, то не выполняется и следующие
	//App\Jobs\SendMessage::dispatch("Test message")->delay(now()->addMinutes(10));//Передает данные в конструктор с помощью dispatch; delay установили с какого момента можно выполнять задание
    return view('default');
});

Route::post('/image/upload', 'ImageController@upload')->name('image.upload');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
