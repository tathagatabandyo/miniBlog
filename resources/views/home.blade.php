<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    #main {
      height: calc(100vh - 56px);
      background-color: #212529;
    }
    #post_data {
      max-height: 70vh;
      background-color: #0000008c;
      border-radius: 10px;
      overflow-y: auto;
    }
    #main nav ul li a {
      background-color: #000;
      border-color: #212529;
    }
    #main nav ul li[aria-disabled="true"] span{
      background-color: #000;
      border-color: #212529;
      color: #fff;
    }
    #post_data {
      color: #fff;
    }
    #post_data .post_d p {
      color: #757779;
    }
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {

    }
    ::-webkit-scrollbar-thumb {
      background-color: #000;
      border-radius: 10px;
    }
    #user_name {
      color: #fff;
      cursor: pointer;
      position: relative;
      user-select: none;
    }
    #setting {
      position: absolute;
      top: 42px;
      right: 10px;
      background-color: #000;
      display: flex;
      flex-direction: column;
      width: 192px;
      border-radius: 10px;
      box-shadow: 0px 0px 4px 1px rgba(255, 255, 255, 0.347);
    }
    #setting a {
      text-decoration: none;
      color: #fff;
      transition: background-color 0.2s linear 0s;
    }
    #setting a:hover {
      background-color: rgba(255, 255, 255, 0.286);
    }
    .hide_ele {
      display: none !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-danger bg-gradient">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="{{url("dashboard")}}">Mini Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        @if (Route::has('login'))
          @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-primary me-2">Dashboard</a>
            <div id="user_name" class="mx-2">
              {{ Auth::user()->name }}
              <span>
                <svg class="fill-current" fill="#fff" style="width:24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </span>
              <div id="setting" class="py-2 hide_ele">
                <a href="{{url("profile")}}" class="px-3 py-1">Profile</a>
                <form action="{{route('logout')}}" method="post">
                  @csrf
                  <a href="{{route('logout')}}" class="px-3 py-1" style="display: block;" onclick="event.preventDefault();
                  this.closest('form').submit();">Logout</a>
                </form>
              </div>
            </div>
        @else
            <a href="{{url("login")}}" class="btn btn-primary me-2">Login</a>
            <a href="{{url("register")}}" class="btn btn-warning ms-2">Register</a>
          @endauth
      @endif
      </div>
    </div>
  </nav>

  <div id="main" class="d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8">
          <div id="post_data">
            @php
                $i=0;
                $l=count($posts);
            @endphp
            @foreach ($posts as $post)
              <div class="post_d py-2 px-4">
                <h6>{{$post->title}}</h6>
                <p>{{$post->body}}</p>
              </div>
              @php
                if($i<$l-1) {
                  echo '<hr class="m-0">';
                }
                $i++;
              @endphp
            @endforeach
          </div>
        </div>
      </div>
      <div class="row justify-content-center mt-2">
        {{-- <div class="col-4">
          {{$post->}}
        </div> --}}
        <div class="col-8">
          {{$posts->links()}}
        </div>
      </div>
    </div>
  </div>

  <script>
    let settingOpenState = 0; 
    document.getElementById("user_name").addEventListener("click",function(){
      event.stopPropagation();
      if(settingOpenState==0) {
          document.getElementById("setting").classList.remove("hide_ele");
          settingOpenState=1;
      }
      else {
          document.getElementById("setting").classList.add("hide_ele");
          settingOpenState=0;
      }
    });
    window.addEventListener("click",function(){
      if(settingOpenState==1) {
        document.getElementById("setting").classList.add("hide_ele");
        settingOpenState=0;
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>






