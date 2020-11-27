@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-style">
        <h2 id="title-text">CSV File Upload Form</h2>

        <h3 id="subtitle-text">
            <!-- {{ isset($uploads) ? 'Edit Uploads Data' : 'Create Upload Data' }} -->

        </h3>

            <div>
                  @if($errors->any())
                        @foreach($errors as $error)
                        <div class="alert alert-danger">
                              {{$error}}
                        </div>
                        @endforeach
                  @endif
            </div>        
            
            <form class="upload-form" action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                
                  <label for="filedesc">File Description:</label>
                  <input type="text" name="filedesc"  id="filedesc" class="form-group"><br>

                  <label for="filedesc">Select a CSV file to upload</label><br>

                  <input type="file" name="file" id="file" class="form-group" > <br>
         
                  <input type="submit" name="submit" id="upload-form-submit" class="btn btn-primary btn-lg">
                  
            </form>
      </div>
</div>
@endsection