@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-style">
        <h2 id="title-text">Certification Form</h2>

        <h3 id="subtitle-text">
            {{ isset($enrolment) ? 'Edit Enrolment Data' : 'Create Enrolment Data' }}

        </h3>

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

        <form method="POST" action="{{ isset($enrolment) ? route('certify.update',$enrolment->id) : route('certify.store') }}">
            @csrf
            @if(isset($enrolment))
                @method('PUT')
            @endif
        
        
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First name" value=" {{ isset($enrolment) ? $enrolment->fname :'' }}">

                <label for="mname">Middle Name</label>
                <input type="text" class="form-control" name="mname"  id="mname" placeholder="Enter Middle name" value="{{ isset($enrolment) ? $enrolment->mname :'' }}">   

                <label for="lname">Last Name</label>
                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last name" value="{{ isset($enrolment) ? $enrolment->lname :'' }}">         
            </div>


            <div class="form-group">
                <label for="company">Company name</label>
                <input type="text" class="form-control" name="company" id="company" placeholder="Enter Company name" value="{{ isset($enrolment) ? $enrolment->company :'' }}">
            </div>
            

            <div class="form-group">
                <label for="training">Training Followed</label>
                <input type="text" class="form-control" name="training" id="training" placeholder="Enter training followed" value="{{ isset($enrolment) ? $enrolment->training :'' }}">
            </div>

            <table>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="startdate">Start date</label>
                            
                            <input type="datetime-local" class="form-control" name="startdate" id="startdate" placeholder="Enter Start date" value="{{ isset($enrolment) ? date('d/m/Y H:i',strtotime($enrolment->startdate)) :'' }}">
                            @if(isset($enrolment))
                                <p>{{date('d/m/Y H:i',strtotime($enrolment->startdate))}}uur</p>
                            @endif
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <label for="enddate">End date</label>
                            <input type="datetime-local" class="form-control" name="enddate" id="enddate" placeholder="Enter End date" >
                            @if(isset($enrolment))
                                <p>{{date('d/m/Y H:i',strtotime($enrolment->enddate))}}uur</p>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        
            <button id="submit" type="submit" class="btn btn-primary"> {{isset($enrolment) ? 'Update Certificate data' : 'Add New Certificate data' }}</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#startdate', {
            enableTime:true
        })
        flatpickr('#enddate', {
            enableTime:true
        })
    </script> -->
@endsection

@section('css')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
@endsection