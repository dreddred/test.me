<?php

namespace Horsefly\Http\Controllers\Auth;

use Auth;
use Horsefly\Http\Controllers\Controller;
use Horsefly\User;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;
use View;


class AuthController extends Controller
{

      public function signup(){

          $user = new User();

          //Проверка, валидация
          $validator = Validator::make(Input::all(), [
              'login' => 'required|max:255|unique:users',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|confirmed|min:6',
              'password_confirmation' => 'same:password',
          ]);

          if($validator->fails())
            return view('signup')->withErrors($validator->errors());

          //Регистрация
          $user->fill(Input::all());

          if($user->signup()) //по хорошему нужно кидать exception, а не юзать if
              return view('signup')->withSuccess('Вы успешно зарегистрированы');
          else
            return "Хуй!";
      }

      public function getLogin() {
        return view('login');
      }

      public function postLogin()
      {
          //Проверка, валидация
          $validator = Validator::make(Input::all(),
              [
                  'username' => 'required|max:255',
                  'password' => 'required|min:6',
              ]
          );

          if($validator->fails())
          {
            return view('login')->withErrors($validator->errors());
          }

          if(Auth::attempt(array('login' => Input::get('username'), 'password' => Input::get('password')), Input::has('remember')))
          {
              return Redirect::intended('/dashboard');
          }

          return view('login')->withMessage("Неверный логин или пароль");
      }

      public function dashboard()
      {
          return View::make('dashboard', array(
              'title' => 'Личный кабинет',
          ));
      }

      public function getLogout()
      {
        Auth::logout();
        Redirect::intended('/')->with('message', 'Сейчас вы будете перенаправлены на главную страницу');
      }
}
