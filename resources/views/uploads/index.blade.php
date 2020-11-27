@extends('layouts.app')

@section('content')
<div id="uploadList" class="container">
        <a id="upload-btn" href="{{route('fileupload.create')}}" class="btn btn-primary btn-sm  mb-2">Upload a CSV file</a>
        <div class="card card-default">

            <div class="card card-header center">Listing of CSV File Uploads</div>    
            
            @if($uploads->count()==0)
            <p>There are no records to display!</p>
            @endif
            <div class="card card-body">
            <table class="table">
                <thead style="background-color:rgb(#fff);">
                    <th>Upload Id</th>
                    <th>File Description</th>
                    <th>File Path</th>
                    <th><i class="far fa-eye"> Content <br> Preview</i></th>
                    <th>Delete<br>
                        <i class="far fa-trash-alt"></i></th>
                </thead>
                <tbody>
                    @foreach($uploads as $upload)
                    <tr>
                        <td>{{$upload->id}}</td>
                        <td>{{$upload->filedesc}}</td>
                        <td>{{$upload->path}}</td>
                        <td><a href="{{route('fileupload.show',$upload->id)}}"><i class="far fa-eye"></i></a></td>
                        <td><a href="#"> <i class="far fa-trash-alt"></i></a></td>
                    </tr>

                    @endforeach
             </tbody>
             </table>   
                
            
            </div>
        </div>

</div>
   @endsection