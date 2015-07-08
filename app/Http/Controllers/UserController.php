<?php

namespace Horsefly\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use View;
use Auth;
use Form;
use Input;
use Horsefly\User;
use Horsefly\Http\Controllers\Controller;

class UserController extends Controller
{

    public function signup(){

        if(Auth::check())
        {
            //Пользователь уже авторизован
            return Redirect::home();
        }

        $user = new User();

        if(Input::has('login'))
        {

            $data = [
                'login' => Input::get('login'),
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'password_confirmation' => Input::get('password_confirmation')
            ];

            //Проверка, валидация
            $validators = Validator::make($data, [
                'login' => 'required|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'same:password',
            ],
            [
                'required'        =>  'Вы не ввели поле :attribute',
                'email'           =>  'E-Mail должен быть корректен',
                'min'             =>  ':attribute не должен быть меньше :min символов',
                'max'             =>  ':attribute не должен быть больше :max символов',
                'confirmation'    => 'Введённые вами пароли не совпадают',
            ]);

            if($validators->fails())
            {
                //Ошибки
                $errorMessage = $validators->messages();
                $errors = "";

                foreach($errorMessage->all() as $messages)
                {
                    $errors .= $messages. "\n" . nl2br("\n");
                }
            }
            else
            {
                //Регистрация
                $user->fill(Input::all());

                if($user->signup()){
                    $success = "Вы успешно зарегистрированы";
                }
            }
        }

        return View::make('signup', array(
            'title' => 'Регистрация на сайте',
            'errors' => isset($errors) ? $errors : null,
            'success' => isset($success) ? $success : null,
        ));
    }

    public function login()
    {
        if(Auth::check()){
            //Пользователь уже авторизован
            return Redirect::home();
        }

        $user = new User();

        if(Input::has('login'))
        {
            $data = [
                'login' => Input::get('login'),
                'password' => Input::get('password'),
                'remember' => (Input::has('remember')) ? true : false,
            ];

            //Проверка, валидация
            $validators = Validator::make($data,
                [
                    'login' => 'required|max:255',
                    'password' => 'required|min:6',
                ],
                [
                    'required'        =>  'Вы не ввели поле :attribute',
                    'min'             =>  ':attribute не должен быть меньше :min символов',
                    'max'             =>  ':attribute не должен быть больше :max символов',
                ]);

            if($validators->fails())
            {
                //Ошибки
                $errorMessage = $validators->messages();
                $errors = "";

                foreach($errorMessage->all() as $messages)
                {
                    $errors .= $messages. "\n" . nl2br("\n");
                }
            }
            else
            {
                if(Auth::attempt(array('login' => $data['login'], 'password' => $data['password']), $data['remember']))
                {
                    return Redirect::intended('/dashboard');
                }
                else
                {
                    $errors = "Произошла ошибка";
                }
            }
        }

        return View::make('login', array(
            'title' => 'Вход на сайт',
            'errors' => isset($errors) ? $errors : null,
            'success' => isset($success) ? $success : null,
        ));

    }

    public function dashboard()
    {
        return View::make('dashboard', array(
            'title' => 'Личный кабинет',
            'errors' => isset($errors) ? $errors : null,
            'success' => isset($success) ? $success : null,
        ));
    }

}