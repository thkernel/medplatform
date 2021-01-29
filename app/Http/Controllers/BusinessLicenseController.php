<?php

namespace App\Http\Controllers;

use App\Models\BusinessLicense;
use Illuminate\Http\Request;

class BusinessLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $business_licenses =  BusinessLicense::orderBy('id', 'desc')->paginate(10)->setPath('business_licenses');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("business_licenses.index", compact(['business_licenses']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $business_license = new BusinessLicense;
        return view('business_licenses.create', compact(['business_license']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

         $request['doctor_id'] = current_user()->id;
     

        $request->validate([
            'reference' => 'required',
            'year' => 'required',

        ]);

        

        BusinessLicense::create($request->all());

   
        return redirect()->route('business_licenses.index')
            ->with('success','Business license created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessLicense  $businessLicense
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessLicense $businessLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessLicense  $businessLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessLicense $business_license)
    {
        //
        return view('business_licenses.edit', compact(['business_license']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessLicense  $businessLicense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessLicense $business_license)
    {
        //
        $request['status'] = "enable";
        $request['doctor_id'] = current_user()->id;
        $request->validate([
            'reference' => 'required',
            'year' => 'required',
            

        ]);
        
        $business_license->update($request->all());

  

        return redirect()->route('business_licenses.index')

                        ->with('success','BusinessLicense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessLicense  $businessLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        BusinessLicense::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}