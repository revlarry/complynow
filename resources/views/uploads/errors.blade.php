@extends('layouts.app')

@section('content')
<div id="uploadList" class="container">
        <a id="upload-btn" href="{{route('fileupload.create')}}" class="btn btn-primary btn-sm  mb-2">Upload a CSV file</a>
        <div class="card card-default">

            <div class="card card-header center">Error Listing - CSV File Uploads</div>    
            
            @if(count($errorReport)==0)
            <p>There are no records to display!</p>
            @endif
            <div class="card card-body">
            <table class="table">
                <thead style="background-color:grey;">
                    <th>First name</th>
                    <th>Middle name</th>
                    <th>Last name</th>
                    <th>Company</th>
                    <th>Training</th>
                    <th>Startdate</th>
                    <th>Enddate</th>
                </thead>
                <tbody>
                    @for($i=0; $i< count($errorReport); $i++) 
                    <tr>
                        @if(!$errorReport[$i]['fnameCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['fname'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['fname'] }}</td>
                        @endif
                        
                        @if(!$errorReport[$i]['mnameCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['mname'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['mname'] }}</td>
                        @endif

                        @if(!$errorReport[$i]['lnameCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['lname'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['lname'] }}</td>
                        @endif          

                        @if(!$errorReport[$i]['companyCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['company'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['company'] }}</td>
                        @endif   

                        @if(!$errorReport[$i]['trainingCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['training'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['training'] }}</td>
                        @endif   

                        @if(!$errorReport[$i]['startdateCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['startdate'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['startdate'] }}</td>
                        @endif   
                             
                        @if(!$errorReport[$i]['enddateCheck'])
                        <td class="err">
                          {{ $errorReport[$i]['enddate'] }} <i class="fas fa-times"></i>
                          </td>
                          @else
                          <td> {{  $errorReport[$i]['enddate'] }}</td>
                        @endif   
       
                    </tr>

                    @endfor
             </tbody>
             </table>   
                
            
            </div>
        </div>

</div>
   @endsection