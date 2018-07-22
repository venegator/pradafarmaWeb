<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	use Favoritable;

	/**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
	protected $guarded = [];

	/**
     * The relations to eager load on every query.
     *
     * @var array
     */
	protected $with = ['owner', 'favorites'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['favoritesCount', 'isFavorited'];


    /**
     * A reply has an owner.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    /**
      * A reply belongs to a thread.
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function thread()
     {
         return $this->belongsTo(Thread::class);
     }

     /**
     * Fetch all mentioned users within the reply's body.
     *
     * @return array
     */
    public function mentionedUsers()
    {
        preg_match_all('/[^a-zA-Z0-9.]@([\w\-]+)/i', $this->body, $matches);
        return $matches[1];
    }

    /**
     * Set the body attribute.
     *
     * @param string $body
     */
    public function setBodyAttribute($body)
    {
        $this->attributes['body'] = preg_replace(
            '/[^a-zA-Z0-9.]@([\w\-]+)/i',
            '<a href="/profiles/$1">$0</a>',
            $body
        );
    }

    /**
     * Determine if the reply was just published a moment ago.
     *
     * @return bool
     */
    public function wasJustPublished()
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }
}
