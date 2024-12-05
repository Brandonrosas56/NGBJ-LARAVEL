<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Store the information from the form.
     */
    public function store(Request $request)
    {
        // Validamos los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Creamos la nueva entrada en la base de datos
        Info::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
        ]);

        // Redirigimos con un mensaje de éxito
        return redirect()->route('')
                         ->with('success', '¡Tu solicitud ha sido enviada con éxito!');
    }
}
