<?php

namespace App\Http\Controllers;

use App\Models\StructureStaff;
use App\Models\Service;
use App\Models\StructureProfile;
use App\Models\Speciality;
use App\Models\StructureType;
use Illuminate\Http\Request;

class StructureStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs =  StructureStaff::orderBy('id', 'asc')->paginate(10)->setPath('staffs');
        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("structure_staffs.index", compact(['staffs']) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $structure_type = StructureType::where("slug", "privee")->first();
        $staff = new StructureStaff;
        $specialities =  Speciality::all();
        $services =  Service::all();
        $structures =  StructureProfile::where('structure_type_id', $structure_type->id)->get();
        return view('structure_staffs.create', compact(['staff','specialities', 'services','structures']));
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
        $request['status'] = "enable";
        $request['user_id'] = current_user()->id;
        $request->validate([
            'civility' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'structure_id' => 'required',
            'speciality_id' => 'required',
            'service_id' => 'required',

        ]);

  

        StructureStaff::create($request->all());

   
        return redirect()->route('structure_staffs.index')
            ->with('success','Structure staff created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(StructureStaff $staff)
    {
        //
         $specialities =  Speciality::all();
        $services =  Service::all();
        $structures =  StructureProfile::all();
        return view('structure_staffs.edit', compact(['staff','specialities', 'services','structures']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StructureStaff $staff)
    {
        //

        $request['status'] = "enable";
        $request['user_id'] = current_user()->id;
        $request->validate([
            'civility' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'structure_id' => 'required',
            'speciality_id' => 'required',
            'service_id' => 'required',

        ]);
        
        $staff->update($request->all());

  

        return redirect()->route('structure_staffs.index')

                        ->with('success','Town updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        StructureStaff::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }
}