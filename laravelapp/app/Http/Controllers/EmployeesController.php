<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Companies;
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
        $employees = Employees::paginate(5);

        return view('employees.index', compact('employees'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_companies' => 'required',
            'email' => 'required|unique:companies|email',
        ]);

        Employees::create($request->all());
   
        return redirect()->route('employees.index')
                        ->with('success', 'Employees created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employees::find($id);
        return view('employees.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employees::find($id);
        $companies = Companies::all();
        return view('employees.edit', compact(['employees', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'id_companies' => 'required',
            'email' => 'required|unique:companies|email',
        ]);

        Employees::find($id)->update($request->all());
   
        return redirect()->route('employees.index')
                        ->with('success', 'Employees updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employees = Employees::find($id);
        $employees->delete();

        return redirect('/employees')->with('success', 'Employees deleted!');
    }
}
