<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\SearchIndex\Searchable as SearchableContract;

class Task extends Model implements SearchableContract
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

    /**
     * Search for a project.
     *
     * @param $searchTerm
     * @return mixed
     */
    public static function search($searchTerm)
    {
        $query = [
            'body' => [
                'query' => [
                    "query_string" => [
                        "fields" => ['task', 'creator'],
                        "query" => '%'.$searchTerm.'%'
                    ],
                ]
            ]
        ];

        $modelIds = collect(\SearchIndex::getResults($query)['hits']['hits'])->map(function ($data) {
            return $data['_id'];
        });

        return self::whereIn('id', $modelIds);
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
     * Returns an array with properties which must be indexed.
     *
     * @return array
     */
    public function getSearchableBody()
    {
        return [
            'task' => $this->subject,
            'creator' => $this->creator->name,
        ];
    }

    /**
     * Return the type of the searchable subject.
     *
     * @return string
     */
    public function getSearchableType()
    {
        return 'tasks';
    }

    /**
     * Return the id of the searchable subject.
     *
     * @return string
     */
    public function getSearchableId()
    {
        return $this->id;
    }
}
