<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/fav.ico')}}">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <style>
        body {
            background-image: url('{{ asset('img/background.png')}}');
            background-repeat: no-repeat;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            width: 100%;
            height:100vh;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      small{
        color: white;
      }

      #toggle{
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        background: url('{{ asset('img/show.png')}}');
        background-size: cover;
        cursor: pointer;
      }
      #toggle.hide{
        background: url('{{ asset('img/hide.png')}}');
        background-size: cover;
      }

      .form-signin input[type="text"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css')}}" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin w-100 m-auto">
    <form action="/login" method="post">
        @csrf
        <img class="mb-4" src="{{ asset('img/logo.png') }}" alt="" width="250" height="130">
        
        <div class="form-floating">
          <input type="text" name="username" class="form-control mb-2" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Username</label>
        </div>
        
        <div class="form-floating">
          <input type="password" name="password" style="background-color: #fafafa; padding-right:45px;" class="form-control" id="floatingPassword" placeholder="Password" required>
          <div id="toggle"></div>
          <label for="floatingPassword">Password</label>
        </div>
        
        <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
        <small class="d-text-center">Dont Have Account? <a href="/register">Register</a>.</small>
    </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      @if (Session::has('username'))
        toastr.error("{{ Session::get('username') }}")
      @endif

      @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
      @endif

      const password = document.getElementById('floatingPassword');
      const toggle = document.getElementById('toggle');
      function showHide(){
        if(password.type == 'password'){
          password.setAttribute('type', 'text');
          toggle.classList.add('hide')
        } else {
          password.setAttribute('type', 'password');
          toggle.classList.remove('hide')
        }
      }
      document.getElementById('toggle').onclick = function(){
        return showHide();
      }
    </script>
  </body>
</html>
