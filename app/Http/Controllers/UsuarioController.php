<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $query = Usuario::query();

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        if ($request->filled('fecha_nacimiento_desde') && $request->filled('fecha_nacimiento_hasta')) {
            $fecha_desde = $request->input('fecha_nacimiento_desde');
            $fecha_hasta = $request->input('fecha_nacimiento_hasta');

            if ($this->validarFechas($fecha_desde, $fecha_hasta)) {
                $query->whereDate('fechaNacimiento', '>=', $fecha_desde)
                    ->whereDate('fechaNacimiento', '<=', $fecha_hasta);
            }
        }

        $usuarios = $query->get();

        return view('index', compact('usuarios'));
    }

    private function validarFechas($fecha_desde, $fecha_hasta)
    {
        if (strtotime($fecha_desde) !== false && strtotime($fecha_hasta) !== false) {
            if (strtotime($fecha_desde) <= strtotime($fecha_hasta)) {
                return true;
            }
        }

        return false;
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios',
            'fechaNacimiento' => 'required|date',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->save();

        return redirect('/')->with('success', 'Usuario creado exitosamente');
    }
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect('/')->with('success', 'Usuario eliminado exitosamente');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo,' . $id, 
            'fechaNacimiento' => 'required|date',
        ]);

        $usuario = Usuario::findOrFail($id);

        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->save();

        return redirect('/')->with('success', 'Usuario Actualizado exitosamente');
    }

}
