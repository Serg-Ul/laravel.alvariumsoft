<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = (int)\request('per_page') ?: 10;
        $employees = Employee::orderByDesc('id')->paginate($per_page);

        return view('admin.employees.index', [
            'employees' => $employees
        ]);
    }


    public function import(Request $req)
    {
        if($req->isMethod("POST")){
            $xmlDataString = file_get_contents($req->file('file'));
            $xmlObject = simplexml_load_string($xmlDataString);

            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true);

            if(count($phpDataArray['employee']) > 0){
                $dataArray = [];

                foreach($phpDataArray['employee'] as $index => $data){
                    if ($data['employee_type'] === 'per_hour') {
                        $data['salary'] = $data['salary'] * $data['work_hours'] * 20;
                    }

                    $dataArray[] = [
                        "fio" => $data['fio'],
                        "birthday_date" => $data['birthday_date'],
                        "position" => $data['position'],
                        "employee_type" => $data['employee_type'],
                        "work_hours" => $data['work_hours'],
                        "salary" => $data['salary']
                    ];
                }

                Employee::insert($dataArray);

                return redirect()->back()->withSuccess('Employees were imported successfully!');
            }
        }
    }

    public function truncate()
    {
        Employee::truncate();

        return redirect()->back()->withSuccess('Employees were truncated successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $per_page = (int)\request('per_page') ?: 10;
        $employees = Employee::where('department_id', '=', $id);
        $department = Department::find($id);

        if (!$department)
            abort(404);

        return view('admin.employees.show', [
            'employees' => $employees->orderByDesc('id')->paginate($per_page),
            'department' => Department::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
