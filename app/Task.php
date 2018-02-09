<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @var array
     */
    protected $dates = ['done_at'];

    /**
     * @var array
     */
    protected $fillable = ['subject', 'done_at'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeFinished($query)
    {
        return $query->whereNotNull('done_at');
    }
}
