<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::paginate(5);

        return view('companies.index', compact('companies'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'email' => 'required|unique:companies|email',
            'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ]);
        
        $companies = new Companies;
            if ($logo = $request->file('logo')) {
                $extension = $logo->getClientOriginalExtension();
                
                Storage::disk('public')->put(pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$extension, File::get($logo));
            }

            $companies->nama = $request->nama;
            $companies->email = $request->email;
            $companies->logo = pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$extension;
            $companies->website = $request->website;
            $companies->save();
   
        return redirect()->route('companies.index')
                        ->with('success', 'Companies created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companies = Companies::find($id);
        $url = Storage::url($companies->logo);
        return view('companies.show', compact(['companies', 'url']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Companies::find($id);
        return view('companies.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'required'
        ]);
        
        $companies = Companies::find($id);
            Storage::delete($companies->logo);

            if ($logo = $request->file('logo')) {
                $extension = $logo->getClientOriginalExtension();
                Storage::disk('public')->put(pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$extension, File::get($logo));
            }

            $companies->nama = $request->nama;
            $companies->email = $request->email;
            $companies->logo = pathinfo($logo->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$extension;
            $companies->website = $request->website;
            $companies->save();
   
        return redirect()->route('companies.index')
                        ->with('success', 'Companies updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies = Companies::find($id);
        Storage::delete($companies->logo);
        $companies->delete();

        return redirect('/companies')->with('success', 'Companies deleted!');
    }
}
