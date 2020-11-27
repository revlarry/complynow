<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEnrolmentRequest;
use App\Http\Requests\UpdateEnrolmentRequest;

use App\Enrolment;

class CertifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('certify.index')->with('enrolments',Enrolment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('certify.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEnrolmentRequest $request)
        {

          Enrolment::create([
              'fname' => $request->fname,
              'mname' => $request->mname,
              'lname' => $request->lname,
              'company' => $request->company,
              'training' => $request->training,
              'startdate' => $request->startdate,
              'enddate' => $request->enddate,
          ]);
    
          session()->flash('success', 'Enrolment was successfully created!');

          return redirect(route('certify.index'));
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   
        $enrolment = Enrolment::find($id);
       
        return view('certify.create')->with('enrolment',$enrolment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnrolmentRequest $request, Enrolment $enrolment)
    {
        $enrolment->update([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'company' => $request->company,
            'training' => $request->training,
   
        ]);

        session()->flash('success','Enrolment successfully Updated!');
        return redirect(route('certify.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    // public function destroy(Enrolment $enrolment)
    {
        $enrolment = Enrolment::find($id);

        $enrolment->delete();

        session()->flash('success','Enrolment data successfully deleted!');

        return redirect(route('certify.index'));
    }
}
