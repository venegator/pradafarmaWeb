<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Thread;
use App\Cita;
use App\Filters\CitasFilters;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	return view('admin.index');
    }

    //USUARIOS
    public function usersIndex(){
    	$users = User::latest()->get();
    	return view('admin.users.index', compact('users'));
    }

    public function createUser(){
    	return view('admin.users.create');
    }

    public function storeUser(Request $request){
        //validate the form

        $this->validate(request(), [
            'name' => 'required|alpha_dash|max:30|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rol' => 'string'
        ]);

        //Create and save the user.

        $user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'rol' => request('rol')
        ]);

        //redirect

        session()->flash('message', 'Usuario registrado');

        return redirect('/admin/users');
    }

    //STOREUSER

    public function editUser(User $user){
    	return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user){
    	$this->validate($request, [
            'name' => 'required|alpha_dash|max:30',
            'email' => 'required|string|email|max:255',
            'avatar' => 'sometimes|image',
            'rol' => 'required'
        ]);

        if (request()->file('imagen')) {
            $user->update([
                'name' => request('name'),
                'email' => request('email'),
                'avatar_path' => request()->file('avatar')->store('avatars', 'public'),
                'rol' => request('rol')
            ]);
        }else{
            $user->update([
                'name' => request('name'),
                'email' => request('email'),
                'rol' => request('rol')
            ]);
        }
        session()->flash('message', 'Usuario actualizado correctamente');

        return redirect('/admin/users');
    }

    public function destroyUser(User $user){
    	//ELIMINAR TODO LO RELACIONADO CON EL USUARIO.

        foreach($user->posts as $post){
            $post->delete();
        }

        foreach($user->threads as $thread){
            foreach($thread->replies as $reply){
                foreach($reply->favorites as $favorite){
                    $favorite->delete();
                }
                $reply->delete();
            }
            $thread->delete();
        }

        foreach($user->replies as $reply){
            foreach($reply->favorites as $favorite){
                $favorite->delete();
            }
            $reply->delete();
        }

        foreach($user->favoritos as $favorite){
            $favorite->delete();
        }

        foreach($user->eventos as $evento){
            foreach($evento->visitas as $visita){
                $visita->delete();
            }
            $evento->delete();
        }

        foreach($user->visitas as $visita){
            $visita->delete();
        }

    	$user->delete();

    	session()->flash('message', 'Usuario eliminado correctamente.');

        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }

        return back();
    }

    //POSTS

    public function postsIndex(){
        $posts = Post::latest()
        ->filter(request()->only(['month', 'year']))
        ->get();

        return view('admin.posts.index',compact('posts'));
    }

    public function createPost(){
        return view('admin.posts.create');
    }

    public function storePost(Request $request)
    {
        // FORM VALIDATION 101
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'imagen' => 'required|image'
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'body' => request('body'),
            'avatar_path' => request()->file('imagen')->store('postsimages', 'public')
        ]);

        session()->flash('message', 'Post creado correctamente');

        return redirect('/admin/posts');
 
    }

    public function editPost(Post $post){
        return view('admin.posts.edit', compact('post'));
    }

    public function updatePost(Request $request, Post $post){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
            'imagen' => 'sometimes|image'
        ]);

        if (request()->file('imagen')) {
            $post->update([
                'title' => request('title'),
                'body' => request('body'),
                'avatar_path' => request()->file('imagen')->store('postsimages', 'public')
            ]);
        }else{
            $post->update([
                'title' => request('title'),
                'body' => request('body'),
            ]);
        }

        session()->flash('message', 'Post actualizado correctamente');

        return redirect('/admin/posts');
    }

    public function destroyPost(Post $post){
        $post->delete();

        session()->flash('message', 'Post eliminado correctamente');

        return redirect('/admin/posts');
    }

    //HILOS

    public function hilosIndex(){
    	$threads = Thread::latest()->get();
    	return view('admin.hilos.index', compact('threads'));
    }

    public function createHilo(){
    	return view('admin.hilos.create');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeHilo(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'canal_id' => 'required|exists:canals,id',
        ]);

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'canal_id' => request('canal_id'),
            'title' => request('title'),
            'body' => request('body')
        ]);

        session()->flash('message', 'Hilo creado correctamente');

        return redirect('/forum' . '/' . $thread->canal->slug . '/' . $thread->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function editHilo($canalId, Thread $thread)
    {
        return view('admin.hilos.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function updateHilo(Request $request, $canal_id, Thread $thread)
    {
        $this->validate(request(), [
            'title' => 'required',
            'canal_id' => 'required',
            'body' => 'required'
        ]);

        $thread->update(request(['title', 'canal_id', 'body']));

        session()->flash('message', 'Hilo actualizado correctamente');

        return redirect('/admin/hilos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroyHilo($canal, Thread $thread)
    {
        $this->authorize('update', $thread);
        
        foreach($thread->replies as $reply){
            foreach($reply->favorites as $favorite){
                $favorite->delete();
            }
            $reply->delete();
        }
        
        $thread->delete();

        session()->flash('message', 'Hilo elimininado correctamente');

        if (request()->wantsJson()){
            return response([], 204);
        }

        return redirect('/admin/hilos');
    }

    //CITAS

    public function citasIndex(CitasFilters $filters){
        $citas = $this->getCitas($filters);
        return view('admin.citas.index', compact('citas'));
    }

    /**
     * Fetch all relevant threads.
     *
     * @param CitasFilters $filters
     * @return mixed
     */
    protected function getCitas(CitasFilters $filters)
    {
        $citas = Cita::filter($filters)->latest();

        return $citas->paginate(20);
    }

    public function createCita(){
        return view('admin.citas.create');
    }

    public function storeCita(Request $request){
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

        return redirect('/admin/citas');
    }

    public function editCita(Cita $cita){
        return view('admin.citas.edit', compact('cita'));
    }

    public function updateCita(Request $request, Cita $cita){
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

        return redirect('/admin/citas');
    }

    /**
     * Delete the given cita.
     *
     * @param  Cita $cita
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyCita(Cita $cita)
    {
        //$this->authorize('update', $reply);

        $cita->delete();

        session()->flash('message', 'Cita eliminada correctamente.');

        return redirect('/admin/citas');
    }

    //EVENTOS

    public function eventosIndex(){
        $eventos = Evento::latest()->get();
        return view('admin.eventos.index', compact('eventos'));
    }

    public function createEvento(){
        return view('admin.eventos.create');
    }

    public function storeEvento(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'descripcion' => 'required',
            'pac-input' => 'required',
            'fecha' => 'required',
            'imagen' => 'required|image'
        ]);

        $evento = Evento::create([
            'title' => request('title'),
            'descripcion' => request('descripcion'),
            'pac_input' => request('pac-input'),
            'fecha' => request('fecha'),
            'avatar_path' => request()->file('imagen')->store('eventsimages', 'public')
        ]);

        session()->flash('message', 'Evento creado correctamente');

        return redirect('/eventos' . '/' . $evento->id);
    }

    public function editEvento(Evento $evento){
        return view('admin.eventos.edit', compact('evento'));
    }

    public function updateEvento(Request $request, Evento $evento){
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

        return redirect('/admin/eventos');
    }

    public function destroyEvento(Evento $evento){

        foreach($evento->visitas as $visita){
            $visita->delete();
        }

        $evento->delete();

        session()->flash('message', 'Evento eliminado correctamente');

        return redirect('/admin/eventos');
    }
}