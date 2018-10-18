<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.10.2018
 * Time: 18:37
 */

namespace App\Http\Controllers\Traits;


use App\Models\Feature;
use App\Models\Project;

trait EmployeeHelper
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function projects()
    {
        return Project::all()->pluck('title', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function features()
    {
        return Feature::all()->pluck('title', 'id');
    }

    /**
     * @return mixed
     */
    public function dynamicFeature()
    {
        return Feature::dynamic()->first()->id;
    }
}
