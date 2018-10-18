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
use DB;

trait CustomSearch
{
    /**
     * @param $query
     * @return mixed
     */
    public static function search($query)
    {
        $columns = ['first_name', 'last_name', DB::raw("concat(first_name, ' ', last_name)")];

        return self::where(function ($q) use ($columns, $query) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'like', "%{$query}%");
            }
        });
    }
}
