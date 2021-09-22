<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.citas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required',
            'descripcion' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        $cita = Cita::create([
            'title' => $data['title'],
            'descripcion' => $data['descripcion'],
            'start' => Carbon::parse($data['start'])->format('Y-m-d H:i:s'),
            'end' => Carbon::parse($data['end'])->format('Y-m-d H:i:s')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
        $cita = Cita::all();

        return response()->json($cita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cita = Cita::find($id);
        // $cita->start = Carbon::createFromFormat('Y-m-d H:i:s', $cita->start)->format('Y-m-d');
        // $cita->end = Carbon::createFromFormat('Y-m-d H:i:s', $cita->end)->format('Y-m-d');

        return response()->json($cita);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cita $cita)
    {
        //
        $data = request()->validate([
            'title' => 'required',
            'descripcion' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        $cita->update([
            'title' => $data['title'],
            'descricion' => $data['descripcion'],
            'start' => Carbon::parse($data['start'])->format('Y-m-d H:i:s'),
            'end' => Carbon::parse($data['end'])->format('Y-m-d H:i:s')
        ]);

        return response()->json($cita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cita = Cita::find($id)->delete();

        return response()->json($cita);
    }
}
