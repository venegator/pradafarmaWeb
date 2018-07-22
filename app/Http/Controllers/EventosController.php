<?php

namespace App\Http\Controllers;

use App\Evento;
use App\User;
use App\Notifications\NuevoEvento;

use Illuminate\Http\Request;

class EventosController extends Controller
{
	public function index(){
		$eventos = Evento::latest()->get();
		return view('eventos.index', compact('eventos'));
	}
    public function create(){
    	return view('eventos.create');
    }

    public function store(Request $request){
    	$this->validate($request, [
            'title' => 'required',
            'descripcion' => 'required',
            'pac-input' => 'required',
            'fecha' => 'required',
            'imagen' => 'required|image' 
        ]);

        $evento = Evento::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'descripcion' => request('descripcion'),
            'pac_input' => request('pac-input'),
            'fecha' => request('fecha'),
            'avatar_path' => request()->file('imagen')->store('eventsimages', 'public')
        ]);

        $usuarios = User::all();

        foreach($usuarios as $user){
            $user->notify(new NuevoEvento($evento));
        }

        session()->flash('message', 'Evento creado correctamente');

        return redirect('/eventos' . '/' . $evento->id);
    }

    public function show(Evento $evento){
    	return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento){
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento){
        $this->validate($request, [
            'title' => 'required',
            'descripcion' => 'required',
            'pac-input' => 'required',
            'fecha' => 'required',
            'imagen' => 'sometimes|image'
        ]);

        if (request()->file('imagen')) {
            $evento->update([
                'title' => request('title'),
                'descripcion' => request('descripcion'),
                'pac_input' => request('pac-input'),
                'fecha' => request('fecha'),
                'avatar_path' => request()->file('imagen')->store('eventsimages', 'public')
            ]);
        }else{
            $evento->update([
                'title' => request('title'),
                'descripcion' => request('descripcion'),
                'pac_input' => request('pac-input'),
                'fecha' => request('fecha')
            ]);
        }

        session()->flash('message', 'Evento actualizado correctamente');

        return redirect('/eventos' . '/' . $evento->id);
    }

    public function destroy(Evento $evento){

        foreach($evento->visitas as $visita){
            $visita->delete();
        }

        $evento->delete();

        session()->flash('message', 'Evento eliminado correctamente');

        return redirect('/eventos');
    }
}
