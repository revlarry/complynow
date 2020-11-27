@extends('layouts.app')

@section('content')
   <div class="card card-default">
       <div class="card card-header center">Listing of Enrolments</div>

       @if($enrolments->count()==0)
            <p class="center"> There are no records to display!</p>
       @endif

       <div class="card card-body table-responsive">
           <table class="table">
               <thead>
                   <th>
                       First name
                   </th>
                   <th>
                       Middle name
                   </th>
                   <th>
                       Last name
                   </th>
                   <th>
                       Company
                   </th>
                   
                   <th>
                       Course
                   </th>

                   <th>
                       Start date
                   </th>

                   <th>
                       End date
                   </th>

                   <th>
                       Upload #
                   </th>

                    <th> Change
                        <i class="fas fa-user-edit"></i>
                    </th>
                    <th> Delete <br>
                        <i class="far fa-trash-alt"></i>
                    </th>

                   <th>Certificate PDF Download
                         <i class="fas fa-download"></i>
                   </th>

               </thead>
               <tbody>
                    @foreach($enrolments as $enrolment)
                    <tr>
                        <td>
                            {{$enrolment->fname}}
                        </td>
                        <td>
                            {{$enrolment->mname}}
                        </td>
                        <td>
                            {{$enrolment->lname}}
                        </td>
                        <td>
                            {{$enrolment->company}}
                        </td>
                        <td>
                            {{$enrolment->training}}
                        </td>
                        <td>
                            {{$enrolment->startdate}}
                        </td>
                        <td>
                            {{$enrolment->enddate}}
                        </td>

                        @auth

                        <td>
                            {{ isset($enrolment->upload_id) ?  $enrolment->upload_id: '-' }} 
                        </td>

                        <td>
                           <a href="{{ route('certify.edit',$enrolment->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                          
                        <td>
                               <a href="#" onclick="return handleDelete({{$enrolment->id}})" class="btn btn-danger">Delete</a>
                        </td>

                        <td>                        
                            <a href="{{route('pdf2.show',$enrolment->id)}}"><i class="fas fa-download"></i></a>                       
                        </td>
                        @else
                        <td>
                           <a href="{{ route('certify.edit',$enrolment->id) }}" class="btn btn-secondary disabled-link">Edit</a>
                        </td>
                          
                        <td>
                               <a href="#" onclick="return handleDelete({{$enrolment->id}})" class="btn btn-secondary disabled-link">Delete</a>
                        </td>

                        <td>                        
                            <a href="{{route('pdf2.show',$enrolment->id)}}" class="disabled-link"><i class="fas fa-download"></i></a>                       
                        </td>
                        @endauth
                    </tr>
                    @endforeach
                </tbody>
           </table>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <form action="" method="POST" id="deleteEnrolmentForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete this certificate?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <p class="text text-bold">
                               Confirm delete of {{$enrolment->fname}} {{$enrolment->lname}}
                           </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">No, Go Back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>


       </div>
   </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id){
           
          
            var form = document.getElementById('deleteEnrolmentForm')
            form.action = '/certify/' + id

            console.log('deleting ...',form)

            $('#deleteModal').modal('show')
        }
        
    </script>

@endsection