<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Visitable
{
    /**
     * A event can be visitado.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function visitas()
    {
        return $this->morphMany(Visita::class, 'visitado');
    }

    /**
     * Visitar the current event.
     *
     * @return Model
     */
    public function visitar()
    {
        $attributes = ['user_id' => auth()->id()];
        
        if (!$this->visitas()->where($attributes)->exists()) {
            return $this->visitas()->create($attributes);
        }
    }
    /**
     * No visitar the current reply.
     */
    public function novisitar()
    {
        $attributes = ['user_id' => auth()->id()];

        $this->visitas()->where($attributes)->get()->each->delete();
    }
    /**
     * Determine if the current event has been visitado.
     *
     * @return boolean
     */
    public function isVisitado()
    {
        return !! $this->visitas->where('user_id', auth()->id())->count();
    }

    /**
     * Fetch the visitado status as a property.
     *
     * @return bool
     */
    public function getIsVisitadoAttribute()
    {
        return $this->isVisitado();
    }

    /**
     * Get the number of visitas for the evento.
     *
     * @return integer
     */
    public function getVisitasCountAttribute()
    {
        return $this->visitas->count();
    }
}
