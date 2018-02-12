<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Searchable;

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
    
    /**
     * Get the creator of this task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the worker of this task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function worker()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'task' => $this->subject,
            'creator' => $this->creator->name,
        ];
    }
}
