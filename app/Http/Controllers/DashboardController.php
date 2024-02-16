<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Application;
use App\Models\Blogs;
use App\Models\Contact;
use App\Models\Countries;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\UserExtrainfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard(){

        return view('dashboard.maindashboard');
    }
    public function login(){

        return view('dashboard.login_register.login');
    }
    public function register(){

        return view('dashboard.login_register.register');
    }
}
