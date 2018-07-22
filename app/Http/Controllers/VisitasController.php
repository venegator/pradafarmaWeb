<?php

namespace App\Http\Controllers;

use App\Evento;

class VisitasController extends Controller
{
    /**
     * Store a new visita in the database.
     *
     * @param  Reply $reply
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(Evento $evento)
    {
        $evento->visitar();

        session()->flash('message', 'Gracias por venir con nosotros');

        return back();
    }

    /**
     * Delete the visita.
     *
     * @param Reply $reply
     */
    public function destroy(Evento $evento)
    {
        $evento->novisitar();

        session()->flash('message', '¡ No dudes en apuntarte a la próxima !');

        return back();
    }

}
