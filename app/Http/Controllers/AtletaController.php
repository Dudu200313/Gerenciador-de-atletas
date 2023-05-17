<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Atleta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AtletaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        User::find(Auth::user()->id)
           ->myAtleta()
           ->create([
              'nome' => $request -> nome,
              'modalidade' => $request -> modalidade,
              'idade' => $request -> idade,
              'altura' => $request -> altura,
              'peso' => $request -> peso
           ]);
           return redirect (route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Atleta $atleta)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atleta $atleta)
    {
        $atleta -> update([
            'nome' => $request -> nome,
            'modalidade' => $request -> modalidade,
            'idade' => $request -> idade,
            'altura' => $request-> altura,
            'peso' => $request-> peso
        ]);

        return redirect (route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $atleta = Atleta::findOrFail($id);
        $atleta-> delete();

        return redirect (route('dashboard'));
    }
}
