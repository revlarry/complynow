<!DOCTYPE html>
<html>
<head>
    <title>Certification - ComplyNow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca8ab3ac50.js" crossorigin="anonymous"></script>
    
    <style>
       
        /* PDF output */
        .awardee-name,.company {
          font-size:300%;
        }

        .push-right {
             text-align:right;   
        }

        .center {
            text-align:center;
        }
        .background-img {
            background-image:url("http://127.0.0.1:8000/img/facet.jpg");           
            height: 600px;
            width: 950px;
            background-size: cover;
        }

        .logo {
            padding-left:15%;
            margin-top:10px;
        }

        
    </style>
</head>
<body>
    
<div class="container background-img">
    
    <div class="logo">
        <img src="/img/complynow.jpg" alt="">
    </div>

    <div class="awardee-name center">
       {{$enrolment->fname}}  {{$enrolment->mname}} {{$enrolment->lname}}
    </div>

    <div class="center">
      <h3>werkzaam bij</h3>
    </div>

    <div class="company center">
        {{$enrolment->company}}
    </div>

    <div class="center">
       <h4>heeft deelgenomen aan de</h4>
    </div>

    <div class="center">
       <h2>  {{$enrolment->training}}</h2>
    </div>

    <div class="center">
       <h3> op</h3>
    </div>

    <div class="center">
    
  
       
       <h3> {{ date('j F, Y', strtotime($enrolment->startdate)) }}</h3>
    </div>

    <div class="center">
       <h3>van  {{date("H:i ",strtotime($enrolment->startdate))}}uur tot {{date("H:i",strtotime($enrolment->enddate))}}uur </h3>
    </div>

    <div style="text-align:right;">
       <h6>Mr. D. Waknine<br> Algemeen Directeur
       </h6>
    </div>
</div>    
</body>
</html>