<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\EmployeeHelper;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Feature;
use App\Models\Project;
use Illuminate\Http\Request;
use MasterRO\Searchable\Searchable;

class EmployeeController extends Controller
{
    use EmployeeHelper;
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('pages.employee.list');
    }

    /**
     * @return mixed
     */
    public function projectList()
    {
        return Project::get([
            'id',
            'title'
        ]);
    }

    /**
     * @return mixed
     */
    public function featureList()
    {
        return Feature::get([
            'id',
            'title',
            'default_value'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $projectList = $this->projects();
        $featureList = $this->features();
        $dynamicFeatureId = $this->dynamicFeature();

        return view('pages.employee.create', compact('projectList', 'featureList', 'dynamicFeatureId'));
    }

    /**
     * @param EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(EmployeeRequest $request)
    {
        $employee = factory(Employee::class)->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        $skills = collect($request->skills)->map(function($item){
            return ['value' => $item];
        });

        if ($skills) {
            $employee->features()->sync($skills);
        }

        if ($request->project && !is_null($request->project[0])) {
            $employee->projects()->sync($request->project);
        }

        if ($request->file) {
            $avatar = $request->file->store('avatars');
        }

        if (!empty($avatar)) {
            $employee->update([
                'avatar' => $avatar
            ]);
        }

        return redirect(route('employees.list'));
    }

    /**
     * @param Request $request
     * @return Employee[]|\Illuminate\Database\Eloquent\Collection
     */
    public function data(Request $request)
    {
        $limit = 10;

        if (!$request->filter) {
            $count = Employee::count();

            return [
                'data' => Employee::offset(($request->page - 1) * $limit)->limit($limit)->get(),
                'count' => $count,
                'totalPages' => ceil($count / $limit),
            ];
        }

        $query = Employee::search($request->filter);
        $data = $query->offset(($request->page - 1) * $limit)->limit($limit)->get();
        $count = $query->count();

        return [
            'data' => $data,
            'count' => $count,
            'totalPages' => ceil($count / $limit),
        ];
    }
}
