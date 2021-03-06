<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
     /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * A visita has an owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A visita belongs to a evento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento(){
        return $this->belongsTo(Evento::class, 'visitado_id');
    }
}
