<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>新聞發佈</title>

       
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}" rel="stylesheet">
        <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        
      
        {{-- import resources/css/app.css --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        
    </head>
    
    <header class="bg-white shadow-sm">
        <div class="container d-none d-md-block" >
            <div class="header-row mx-5 mx-auto">
                <a href="{{ url('/') }}" >
                    <img src="{{ asset('image/logo.png') }}" alt="logo" class="header-logo logo1 " />
                </a>

                <a href="{{ url('/') }}" class="px-4">
                    <img src="{{ asset('image/logo2.png') }}" alt="logo2" class="header-logo "/>
                </a>

                <div class="header-right float-end">
                    <div class="social-media px-2 py-2" >
                        <a href="{{ url('/') }}" class="px-2">
                            <img src="{{ asset('image/header-right-topBar-mail.png') }}" alt="logo2" class="social-logo"/>
                        </a>
                        <a href="{{ url('/') }}"class="px-2" >
                            <img src="{{ asset('image/header-right-topBar-fb.png') }}" alt="logo2" class="social-logo"/>
                        </a>
                        <a href="{{ url('/') }}" class="px-2">
                            <img src="{{ asset('image/header-right-topBar-ig.png') }}" alt="logo2" class="social-logo"/>
                        </a>
                        <a href="{{ url('/') }}" class="px-2">
                            <img src="{{ asset('image/header-right-topBar-youtube.png') }}" alt="logo2" class="social-logo"/>
                        </a>
                    </div>
                    <div class="login">
                        <div >
                            <a class='px-3 fw-bold'>登入</a> | <a class='px-3 fw-bold'>會員註冊</a>
                        </div>
                        
                    </div>
                </div>

                

            </div>
        </div>

        <div class="header-nav d-none d-md-block">
            <nav id="w1" class="navbar navbar-expand-lg navbar-light">
              <div class="container">
                <a class="navbar-brand" href="/"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#w1-collapse" aria-controls="w1-collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="w1-collapse">
                  <ul class="navbar-nav flex-fill">
                    <li class="nav-item dropdown flex-fill">
                      <a class="nav-link dropdown-toggle" href="" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">最新消息 <span class="caret"></span></a>
                      <ul class="dropdown-menu" >
                        <li><a class="dropdown-item" href="/lst-housing-new-project">樂屋新項目</a></li>
                        <li><a class="dropdown-item" href="/press-release">新聞發佈</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown flex-fill">
                      <a class="nav-link dropdown-toggle" href="/housing-application" role="button" data-bs-toggle="dropdown" aria-expanded="false">申請樂屋 <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/lst-housing-project">樂屋項目</a></li>
                        <li><a class="dropdown-item" href="/application">申請</a></li>
                        <li><a class="dropdown-item" href="/faqs">FAQs</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown flex-fill">
                      <a class="nav-link dropdown-toggle" href="/household-information" role="button" data-bs-toggle="dropdown" aria-expanded="false">劏房戶資訊 <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/housing-rental-control">劏房租務管制</a></li>
                        <li><a class="dropdown-item" href="/useful-information">實用資訊</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown flex-fill">
                      <a class="nav-link dropdown-toggle" href="/lst-housing-story" role="button" data-bs-toggle="dropdown" aria-expanded="false">樂屋故事 <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/story">樂屋故事</a></li>
                        <li><a class="dropdown-item" href="/about-us">關於樂屋</a></li>
                      </ul>
                    </li>
                    <li class="nav-item flex-fill">
                      <a class="nav-link" href="/contact">聯絡我們</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>

    </header>
      
      

    @yield('content')

    <footer class="fixed-bottom bg-light py-3">
        <div class="container">
          <p class="text-center m-0">Design by Yeung Tsz Wa</p>
        </div>
      </footer>
      
      
</html>

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script>
    
    $(document).ready(function(){
        //when dropdown-toggle is hovered, dropdown-menu will show
        $(".dropdown-toggle").hover(function(){
            //set the dropdown-toggle to active
            $(this).addClass("active");
            $(this).next(".dropdown-menu").show();
        }, function(){
            $(this).next(".dropdown-menu").hide();
            $(this).removeClass("active");
        });

        $(".dropdown-menu").hover(function(){
            //set the dropdown-toggle to active
            $(this).addClass("active");
            $(this).show();
            //set the dropdown-toggle to active
            $(this).prev(".dropdown-toggle").addClass("active");
        }, function(){
            $(this).hide();
            $(this).removeClass("active");
            $(this).prev(".dropdown-toggle").removeClass("active");
        });
    
    });

</script>