<?php

namespace App;

use App\Filters\ThreadFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
	protected $guarded = [];

    protected $with = ['creator', 'canal'];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies'); //Crea una variable que cuenta el número de respuestas a un hilo.
        });
    }

    public function creator(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function canal(){
        return $this->belongsTo(Canal::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class)
            ->withCount('favorites')
            ->with('owner');
    }

    public function addReply($reply){
    	$this->replies()->create($reply);

        return $reply;
    }
    /**
     * Apply all relevant thread filters.
     *
     * @param  Builder       $query
     * @param  ThreadFilters $filters
     * @return Builder
     */
    public function scopeFilter($query, ThreadFilters $filters)
    {
        return $filters->apply($query);
    }
}
