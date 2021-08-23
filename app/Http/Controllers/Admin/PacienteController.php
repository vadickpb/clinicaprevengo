<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pacientes = Paciente::all();

        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'nombre' => 'required|min:3|regex:/^[a-zA-Z ]+$/',
            'apellido' => 'required|min:3|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:pacientes,email',
            'telefono' => 'required|unique:pacientes,telefono'

        ]);

        Paciente::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
        ]);



        return redirect()->route('pacientes.index')
                            ->with('message', 'agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
        $data = request()->validate([
            'nombre' => 'required|min:3|regex:/^[a-zA-Z ]+$/',
            'apellido' => 'required|min:3|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email',
            'telefono' => 'required'

        ]);

        $paciente->update([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
        ]);

        return redirect()->route('pacientes.index')
                            ->with('message', 'editado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
        $paciente->delete();

        return redirect()->route('pacientes.index')
                            ->with('message', 'eliminado');
    }
}
