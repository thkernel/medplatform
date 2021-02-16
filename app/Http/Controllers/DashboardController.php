<?php

namespace App\Http\Controllers;

use App\Models\DoctorOrder;
use App\Models\StructureProfile;
use App\Models\SubscriptionRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $total_doctors =  count(DoctorOrder::all());
        $total_structures =  count(StructureProfile::all());
        $total_pending_subscription = count(SubscriptionRequest::where("status", '<>', "validated")->get());

        activities_logger($this->getCurrentControllerName(), $this->getCurrentActionName(),'');
        return view("dashboard.index", compact(['total_doctors', 'total_structures', 'total_pending_subscription']) );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $feature = new Feature;

        $models = get_all_models();

        //dd($models);
        return view('features.create', compact(['feature', 'models']));
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



        //$request['user_id'] = current_user()->id;
        $request['status'] = 'enable';
        $request->validate([
            'name' => 'required',
            'subject_class' => 'required',

        ]);

  

        Feature::create($request->all());

   
        return redirect()->route('features.index')
            ->with('success','Feature created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        //
        return view('feature.edit',compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        //

        $request->validate([
        'name' => 'required',   
        'subject_class' => 'required',   

        ]);

  
        $feature->update($request->all());

  

        return redirect()->route('features.index')

                        ->with('success','Feature updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Feature::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');

    }
}