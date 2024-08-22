<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $users = User::all();


        return view('teacher.index', compact('teachers', 'users'));
    }

    
}
