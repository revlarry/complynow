@extends('layouts.app')

@section('content')

    <table class="table-responsive">
      
        <?php $myfile = fopen('storage/'.$uploadRec->path, "r") or die("Unable to open file!"); ?>
        
        @while (!feof($myfile))
        <tr>
            <td>  
                {{fgets($myfile)}}
            </td>
        </tr>
        @endwhile

        <?php fclose($myfile); ?>
    </table>

@endsection