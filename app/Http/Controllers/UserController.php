<?php

namespace App\Http\Controllers;

use App\User;
use App\Animal;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
          'users'  => User::get(),
        ]);//Передаем список всех пользователей
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
          'user'  => [],
        ]);//Форма для создания записи в базе
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());//Создание записи в бд
        $user->animal()->create($request->only('name_animal'));//Создание записи в бд, animal() - мой метод который связывает пользователя с животным, only() - 

        return redirect()->route('user.show', $user);//Переходим на метод show
    }//Получение данных из формы и запись их в базу

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
          'user'  => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->update($request->all());

        ($user->animal()->count()) ? 
            $user->animal()->update($request->only('name_animal')) : $user->animal()->create($request->only('name_animal'));

        return redirect()->route('user.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->animal()->delete();
        $user->delete();

        return redirect()->route('user.index');
    }
}
