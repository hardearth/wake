<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Gestión de ventas y Pagos Recibidos
     * @return void
     */
    public function payments()
    {
        return view('teacher.payments');
    }

    /**
     * Lista de alumnos
     * @return void
     */
    public function students()
    {
        return view('teacher.students');
    }
}
