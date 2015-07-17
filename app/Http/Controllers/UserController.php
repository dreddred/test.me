<?php

namespace Horsefly\Http\Controllers;

use Auth;
use Form;
use Horsefly\Http\Controllers\Controller;
use Horsefly\User;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;
use View;

class UserController extends Controller
{
    public function dashboard()
    {
        return View::make('dashboard', array(
            'title' => 'Личный кабинет',
            'errors' => isset($errors) ? $errors : null,
            'success' => isset($success) ? $success : null,
        ));
    }

}
