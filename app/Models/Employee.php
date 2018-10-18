<?php

namespace App\Models;

use App\Http\Controllers\Traits\CustomSearch;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use MasterRO\Searchable\SearchableContract;

class Employee extends Model implements SearchableContract
{
    /**
     * Search Trait
     */
    //use Searchable; /* (Algolia method Search) */
    use CustomSearch;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'employees_first_name_index';
    }

    /**
     * @var array
     */
    public $fillable = ['first_name', 'last_name', 'avatar'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['features', 'projectsNumber', 'averageSkill'];

    /**
     * @return array
     */
    public static function searchable(): array
    {
        return ['first_name', 'last_name'];
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'employee_features')->withPivot('value');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_projects');
    }

    /**
     * @param $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        if ($value) {
            return asset('uploads/' . $value);
        }

        return asset('uploads/no_image.png');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getFeaturesAttribute()
    {
        return $this->features()->get();
    }

    /**
     * @return int
     */
    public function getProjectsNumberAttribute()
    {
        return $this->projects()->count();
    }

    /**
     * @return mixed
     */
    public function getAverageSkillAttribute()
    {
        return round($this->features()->average('value'), 2);
    }
}
