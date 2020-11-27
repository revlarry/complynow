<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ca8ab3ac50.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/img/complynow.jpg" width="auto" height="200px" alt="">
        </div>

        <div class="topnav" id="myTopnav">
            <a class="active" href="/"> <img src="/img/complynow.jpg" width="auto" height="30px" alt="logo"> Home</a>      
          
            <a href="{{route('certify.create')}}">Create</a>
          
            <a href="{{route('certify.index')}}">View/Download</a>
            
            <a href="{{route('fileupload.index')}}">Upload</a>
            
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>

             <!-- Right Side Of Navbar -->
        
            <!-- Authentication Links -->
            @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                @if (Route::has('register'))                
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
            
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            @endguest

        </div>

   
        <main>
            <br>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
            @endif

            @yield('content')
            @yield('scripts')
        </main>

    <footer>   
        <div class="container">
            
            <div class="col-md-4 col-md-offset-4">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> All Rights Reserved.
                    <div class="credits">
                        Designed by <a href="#">Larry Dorkenoo</a></div>
                    </div>
                </div>
            </div>

        </div>
  </footer>


    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

    <script>
        window.onscroll = function() {myFunction2()};

        var navbar = document.getElementById("myTopnav");
        var sticky = navbar.offsetTop;

        function myFunction2() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

     @yield('scripts')
</body>
</html>