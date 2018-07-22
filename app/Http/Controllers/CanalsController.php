<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Canal;
use Illuminate\Http\Request;

class CanalsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random = str_random(20);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $canal = Canal::create([
            'name' => request('name'),
            'slug' => $random
        ]);

        session()->flash('message', 'Canal creado correctamente');

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
    	$canal = Canal::find(request('canal_id'));

        foreach($canal->threads as $thread){
            foreach($thread->replies as $reply){
                foreach($reply->favorites as $favorite){
                    $favorite->delete();
                }
                $reply->delete();
            }
            $thread->delete();
        }

        $canal->delete();

        if (request()->wantsJson()){
            return response([], 204);
        }

        session()->flash('message', 'Canal eliminado correctamente');

        return redirect('/forum');
    }
}
