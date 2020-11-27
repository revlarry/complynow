<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
     /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        Excel::import(new ImportUsers, request()->file('file'));
           
        return back();
    }

}