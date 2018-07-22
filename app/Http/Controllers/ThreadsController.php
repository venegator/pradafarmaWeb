<?php

namespace App\Http\Controllers;

use App\Canal;
use App\Filters\ThreadFilters;
use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Canal $canal, ThreadFilters $filters)
    {
        $threads = $this->getThreads($canal, $filters);
        return view('forum.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect('/forum' . '/' . $thread->canal->slug . '/' . $thread->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($canalSlug, Thread $thread)
    {
        return view('forum.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(20)
        ]);
    }

    /**
     * Fetch all relevant threads.
     *
     * @param Channel       $channel
     * @param ThreadFilters $filters
     * @return mixed
     */
    protected function getThreads(Canal $canal, ThreadFilters $filters)
    {
        $threads = Thread::latest()->filter($filters);

        if ($canal->exists) {
            $threads->where('canal_id', $canal->id);
        }

        return $threads->paginate(20);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit($canalId, Thread $thread)
    {
        return view('forum.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $canal_id, Thread $thread)
    {
        $this->validate(request(), [
            'title' => 'required',
            'canal_id' => 'required',
            'body' => 'required'
        ]);

        $thread->update(request(['title', 'canal_id', 'body']));

        session()->flash('message', 'Hilo actualizado correctamente');

        return view('forum.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(20)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($canal, Thread $thread)
    {
        $this->authorize('update', $thread);
        
        foreach($thread->replies as $reply){
            foreach($reply->favorites as $favorite){
                $favorite->delete();
            }
            $reply->delete();
        }
        
        $thread->delete();

        if (request()->wantsJson()){
            return response([], 204);
        }

        return redirect('/forum');
    }
}
