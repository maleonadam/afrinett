<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use DB;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{

    public function allemployees()
    {
        return view('employee.index');
    }
    public function create(Company $company)
    {
        return view('employee.create', compact('company'));
    }

    public function store(StoreEmployeeRequest $request, Company $company)
    {
        $company->employees()->create($request->validated());

        return redirect()->route('companies.employees.create', [$company]);
    }

    public function edit(Company $company, Employee $employee)
    {
        return view('employee.edit', compact(['company', 'employee']));
    }

    public function update(StoreEmployeeRequest $request, Company $company, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()->route('companies.employees.create', [$company]);
    }

    public function destroy(Company $company, Employee $employee)
    {
        $employee->delete();

        return redirect()->route('companies.employees.create', [$company]);
    }

    public function dataTable()
    {
        $allemployees = DB::table('employees')
            ->join('companies', 'employees.company_id', '=', 'companies.id')
            ->select('employees.*', 'companies.name')
            ->get();

        return DataTables::of($allemployees)->make(true);
    }
}
