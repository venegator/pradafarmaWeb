<?php

namespace App;

use App\Filters\CitasFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Cita extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'servicio', 'name', 'apellidos', 'email', 'fecha', 'observaciones',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
    }

    /**
     * Apply all relevant thread filters.
     *
     * @param  Builder       $query
     * @param  ThreadFilters $filters
     * @return Builder
     */
    public function scopeFilter($query, CitasFilters $filters)
    {
        return $filters->apply($query);
    }

    public function getFechaAttribute($date)
    {
        return Carbon::parse($date);
    }
}
