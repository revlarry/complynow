@extends('layouts.app')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
        @endforeach
    </ul>
</div>

@endif

    <form action="{{route('fileupload.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
        <label for="filedesc">Enter file description</label>
        <input type="text" name="filedesc" id="filedesc" class="form-group"><br>

        <label for="file">Upload CSV file</label>
        <input type="file" name="file" id="file" class="form-group">

        <input type="submit" name="submit" id="submit" class="form-group btn-primary">
    </form>

@endsection