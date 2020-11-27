<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFileuploadRequest;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Arr;
use App\Uploads;
use App\Enrolment;

class FileuploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('uploads.index')->with('uploads',Uploads::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploads.fileupload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFileUploadRequest $request)
    {
        $path = $request->file->store('csv');   // Path uploaded CSV file

        $contents = Storage::get($path);

        $contents_array = explode("\r\n",$contents);  // Explode contents into an array


        if(count($contents_array)< 5 ){  // Check to make sure min. 5 records are being uploaded
            session()->flash('error','Error: Minimum of 5 records required in upload!');
            return view('uploads.index')->with('uploads',Uploads::all());

        } else  // More than 5 records exist .....

        {
            // Start validating the array field contents record by record
            $dataOK = array(); // Array for error flags
            $errorReport = array(); // Array for reporting all errors
   
            for($i=0;$i<count($contents_array)-1;$i++){     // process each row with validation
         
                $array_parts = explode(';',$contents_array[$i]);  // explode each record into component fields for validation
               
                $dataItems[$i]["fname"]     = $array_parts[0];
                // Validate this field as alpha
                ctype_alpha( $dataItems[$i]["fname"])? $dataItems[$i]["fnameCheck"] = true : $dataItems[$i]["fnameCheck"] = false;
                
                $dataItems[$i]["mname"]     = $array_parts[1];
                // Validate this field as alpha
                ctype_alpha( $dataItems[$i]["mname"])? $dataItems[$i]["mnameCheck"] = true : $dataItems[$i]["mnameCheck"] = false;

                $dataItems[$i]["lname"]     = $array_parts[2];
                // Validate this field as alpha
                ctype_alpha( $dataItems[$i]["lname"])? $dataItems[$i]["lnameCheck"] = true : $dataItems[$i]["lnameCheck"] = false;

                $dataItems[$i]["company"]   = $array_parts[3];
                // Validate this field as alphanumeric
                is_string( $dataItems[$i]["company"])? $dataItems[$i]["companyCheck"] = true : $dataItems[$i]["companyCheck"] = false;
                
                $dataItems[$i]["training"]  = $array_parts[4];
                // Validate this field as alphanumeric
                is_string( $dataItems[$i]["training"])? $dataItems[$i]["trainingCheck"] = true : $dataItems[$i]["trainingCheck"] = false;                    

                $dataItems[$i]["startdate"] = $array_parts[5];  //strtotime
                // Validate this field as date string
                strtotime($dataItems[$i]["startdate"])? $dataItems[$i]["startdateCheck"] = true : $dataItems[$i]["startdateCheck"] = false;                    

                $dataItems[$i]["enddate"]   = $array_parts[6];
                // Validate this field as date string
                strtotime($dataItems[$i]["enddate"])? $dataItems[$i]["enddateCheck"] = true : $dataItems[$i]["enddateCheck"] = false;                            
            }      
                
        }
        // Search for incorrect values 
        $errorReport=array();
        for($i=0;$i<count($dataItems); $i++){
          
            if(!$dataItems[$i]['fnameCheck']){   // Store in array records with errors
             $errorReport[]=$dataItems[$i];
             continue;
            }

            if(!$dataItems[$i]['mnameCheck']){   // Store in array records with errors
                $errorReport[]=$dataItems[$i];
                continue;
               }

            if(!$dataItems[$i]['lnameCheck']){   // Store in array records with errors
                $errorReport[]=$dataItems[$i];
                continue;
            }     
            
            if(!$dataItems[$i]['companyCheck']){   // Store in array records with errors
                $errorReport[]=$dataItems[$i];
                continue;
            } 

            if(!$dataItems[$i]['trainingCheck']){   // Store in array records with errors
                $errorReport[]=$dataItems[$i];
                continue;
            }  

            if(!$dataItems[$i]['startdateCheck']){   // Store in array records with errors
                $errorReport[]=$dataItems[$i];
                continue;
            }  
            
            if(!$dataItems[$i]['enddateCheck']){   // Store in array records with errors
                $errorReport[]=$dataItems[$i];
                continue;
            }           
        }
    

        if(count($errorReport)>0) {
            session()->flash('error','Upload failed! There were validation errors (marked in \'Red\' below) found with your data! Correct and try again!');
            return view('uploads.errors')->with('errorReport',$errorReport); 
        } else 
        {
           $data = Uploads::create([
                'filedesc' => $request->filedesc,
                'path' => $path,
            ]);

            $uploadID = $data->id;  // Use upload ID with Enrolments

            // Save validated uploaded data to Enrolments table
            for($i=0;$i<count($dataItems); $i++){ 
           
                $startTime = strtotime($dataItems[$i]["startdate"]);
                $endTime  = strtotime($dataItems[$i]["enddate"]);

                Enrolment::create([
                    'fname' =>  $dataItems[$i]["fname"],
                    'mname' => $dataItems[$i]["mname"],
                    'lname' => $dataItems[$i]["lname"],
                    'company' => $dataItems[$i]["company"],
                    'training' => $dataItems[$i]["training"],
                    'startdate' => date("Y-m-d H:i:s", $startTime),
                    'enddate' => date("Y-m-d H:i:s", $endTime),
                    'upload_id' => $uploadID,
                ]);
          
            }

            session()->flash('success', 'Upload successfully inserted in Enrolments table!');
      
            return redirect(route('certify.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uploadRec = Uploads::find($id);
        return view('uploads.preview')->with('uploadRec',$uploadRec);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
