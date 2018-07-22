<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use App\User;
use App\Notifications\HasSidoMencionado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RepliesController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function store($canalId, Thread $thread){
        if (Gate::denies('create', new Reply)) {
            session()->flash('error', 'Espera un minuto antes de publicar un comentario de nuevo.');
            return back();
        }

        $this->validate(request(), ['body' => 'required']);

        $reply = Reply::create([
            'body' => request('body'),
            'user_id' => auth()->id(),
            'thread_id' => $thread->id
        ]);

        preg_match_all('/[^a-zA-Z0-9.]@([\w\-]+)/i', $reply->body, $matches);

        foreach ($matches[1] as $name){
            if ($user = User::where('name', $name)->first()) {
                $user->notify(new HasSidoMencionado($reply));
            }
        }

        session()->flash('message', 'Comentario publicado correctamente.');

    	return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($canalSlug, Thread $thread, Reply $reply)
    {
        return view('forum.editReply',compact('reply'));
    }

    /**
     * Update an existing reply.
     *
     * @param Reply $reply
     */
    public function update(Request $request, Reply $reply)
    {
        $this->authorize('update', $reply);

        $this->validate(request(), ['body' => 'required']);

        $reply->update(request(['body']));

        session()->flash('message', 'Comentario actualizado correctamente');

        return back();
    }

    /**
     * Delete the given reply.
     *
     * @param  Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        session()->flash('message', 'Comentario eliminado correctamente.');

        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }

        return back();
    }
}
