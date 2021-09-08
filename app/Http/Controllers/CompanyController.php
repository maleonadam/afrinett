<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    
    public function index()
    {
        // $companies = Company::orderBy('id', 'ASC')->get();
        $companies = Company::with('employees')->get();
        
        return view('home', compact('companies'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = new Company();

        $company->name = $request->input('name');
        $company->email = $request->input('email');

        if ($request->hasFile('logo')) {

            $filename = $request->logo->getClientOriginalName();

            if ($company->logo) {
                Storage::delete('/public/logos/'.$company->logo);
            }

            $request->logo->storeAs('logos', $filename, 'public');

            $company->logo = $filename;
        }

        $company->website = $request->input('website');

        $company->save();

        // send mail
        // Mail::send(new CompanyCreated($company));

        return redirect()->route('home');
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return redirect()->route('home');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('home');
    }
}
