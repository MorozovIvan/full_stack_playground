<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * @var array
     */
    public $fillable = ['title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeDynamic($query)
    {
        return $query->where('dynamic', true);
    }
}
