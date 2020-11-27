<!DOCTYPE html>
<html>
<head>
    <title>Laravel Import Data From Excel File Into database - w3alert.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            Laravel Import Data From Excel File Into database
        </div>
        <div class="card-body">
            <form action="{{ url('import') }}" method="POST" name="importform" 
               enctype="multipart/form-data">
                {{ csrf_token() }}
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import File</button>
            </form>
        </div>
    </div>
</div>
   
</body>
</html