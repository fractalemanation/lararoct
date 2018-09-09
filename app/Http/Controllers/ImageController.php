<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request) {// Принимаем данные из формы с помощью Request
    	$path = $request->file('image')->store('uploads', 'public');//store('создаваемая папка хранения', 'filesystems')
    	// Image::create() - путь в базу данных для вывода в шаблонах
    	return view('default', ['path' => $path]);// compact('path') - передает массив содержащий переменные и их значение
    }
}
