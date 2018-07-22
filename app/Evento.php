<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	use Visitable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'descripcion', 'pac_input', 'fecha', 'avatar_path',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
	protected $with = ['owner', 'visitas'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['visitasCount', 'isVisitado'];

    /**
     * A event has an owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
