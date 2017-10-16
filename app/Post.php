<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'is_published', 'user_id'
    ];


    public function scopePublished()
    {
    	return $this->where('is_published', '=', 1);
    }

    public function scopeFilter($query, $filters)
    {
        if (!empty($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (!empty($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addComment($body)
    {
        $user_id = auth()->user()->id;

        $this->comments()->create(compact('body', 'user_id'));

        /*Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);*/
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
                        ->where('is_published', '=', 1)
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(created_at) desc')
                        ->get()
                        ->toArray();
    }
}
