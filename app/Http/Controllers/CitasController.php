<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Filters\CitasFilters;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['index', 'create', 'store', 'edit', 'udpate', 'destroy']]);
    }

	public function index(CitasFilters $filters){
    	$citas = $this->getCitas($filters);
        return view('citas.index', compact('citas'));
    }

    public function indexNutri(){
    	$citas = Cita::where('servicio', 'Nutricionista')->get();
        return view('citas.index', compact('citas'));
    }

    public function create(){
    	return view('citas.create');
    }

    public function store(Request $request){

    	$this->validate($request, [
            'servicio' => 'required',
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'fecha' => 'required',
            'observaciones' => 'required'
        ]);

        $cita = Cita::create([
            'servicio' => request('servicio'),
            'name' => request('name'),
            'apellidos' => request('apellidos'),
            'email' => request('email'),
            'fecha' => request('fecha'),
            'observaciones' => request('observaciones'),
        ]);

        session()->flash('message', 'Cita creada correctamente');

        return redirect('/citas');
    }

    public function edit(Cita $cita){
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, Cita $cita){
        $this->validate($request, [
            'servicio' => 'required',
            'name' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'fecha' => 'required',
            'observaciones' => 'required'
        ]);

        $cita->update(request(['servicio', 'name', 'apellidos', 'email', 'fecha', 'observaciones']));

        session()->flash('message', 'Cita actualizada correctamente');

        return redirect('/citas');
    }
    /**
     * Delete the given cita.
     *
     * @param  Cita $cita
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cita $cita)
    {
        //$this->authorize('update', $reply);

        $cita->delete();

        session()->flash('message', 'Cita eliminada correctamente.');

        return redirect('/citas');
    }

    /**
     * Fetch all relevant threads.
     *
     * @param Channel       $channel
     * @param ThreadFilters $filters
     * @return mixed
     */
    protected function getCitas(CitasFilters $filters)
    {
        $citas = Cita::filter($filters)->orderBy('fecha', 'asc');

        return $citas->paginate(20);
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNutricionista()
    {
        return view('citas.nutricionista');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPiel()
    {
        return view('citas.piel');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPielRapido()
    {
        return view('citas.pielRapido');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCapilar()
    {
        return view('citas.capilar');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPedicular()
    {
        return view('citas.pedicular');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCelulitis()
    {
        return view('citas.celulitis');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCabina()
    {
        return view('citas.cabina');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSanguineo()
    {
        return view('citas.sanguineo');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHipidico()
    {
        return view('citas.hipidico');
    }

}
