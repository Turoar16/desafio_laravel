<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ingreso;
use App\Models\Gasto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $user_id = Auth::id();

        // Calcular el total de ingresos del usuario
        $total_ingresos = Ingreso::where('usuario_id', $user_id)->sum('monto');

        // Calcular el total de gastos del usuario
        $total_gastos = Gasto::where('usuario_id', $user_id)->sum('monto');

        // Calcular el saldo
        $saldo = $total_ingresos - $total_gastos;

        // Pasar los datos a la vista
        return view('home', compact('saldo', 'total_ingresos', 'total_gastos'));
    }
}
