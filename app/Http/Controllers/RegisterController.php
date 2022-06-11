<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required','max:255','min:3'],
            'username' => ['required','max:255','min:3', Rule::unique('users','username')], //'unique:users,username'
            'email' => ['required','email','max:255', Rule::unique('users','email')],
            'password' => ['required','min:7','max:255'],
        ]);

        //$attributes['password'] = bcrypt($attributes['password']);

        // or use mutator

        User::create($attributes);

        return redirect('/');
    }
}
