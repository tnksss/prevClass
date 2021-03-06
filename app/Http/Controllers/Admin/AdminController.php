<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\Manager;
use App\Models\Unity;
use App\Models\Supply;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Users\User;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unities = Unity::all();
        $teachers = User::all();
        $supplies = Supply::all();
        $students = Student::all();
        $enrollments = Enrollment::all();
        $managers = Manager::all();
        return view('admin.home', compact([
            'unities',
            'teachers',
            'supplies',
            'students',
            'enrollments',
            'managers',
        ]));
    }
    public function managers()
    {
        $managers = Manager::all();
        return view('admin.managers',compact('managers'));
    }
}
