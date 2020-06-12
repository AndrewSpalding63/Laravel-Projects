<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      =>  'string|required',
            'email'     =>  'email|nullable',
            'website'   =>  'string|nullable',
            'logo'      =>  'nullable|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        }

        if (Company::create($data)) {
            return back()->with(['message' => 'Company created successfully!', 'status' => 'success']);
        } else {
            return back()->with(['message' => 'Something went wrong!', 'status' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name'      =>  'string|required',
            'email'     =>  'email|nullable',
            'website'   =>  'string|nullable',
            'logo'      =>  'nullable|mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('logo')) {
            if (file_exists(public_path() . Storage::url($company->logo))) {
                Storage::delete($company->logo);
            }
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        }

        if ($company->update($data)) {
            return back()->with(['message' => 'Company updated successfully!', 'status' => 'success']);
        } else {
            return back()->with(['message' => 'Something went wrong!', 'status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if (file_exists(public_path() . Storage::url($company->logo))) {
            Storage::delete($company->logo);
        }
        if ($company->delete()) {
            return back()->with(['message' => 'Company deleted successfully!', 'status' => 'success']);
        }
    }
}
