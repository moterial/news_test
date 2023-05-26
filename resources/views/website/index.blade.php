@extends('layouts.website')

@section('content')

<section class="container">
    <div class="row my-3 ms-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">主頁</a></li>
              <li class="breadcrumb-item"><a href="#">最新消息</a></li>
              <li class="breadcrumb-item breadcrumb-active" aria-current="page">新聞發佈</li>
            </ol>
        </nav>
    </div>

    <div class="main-content ">
        <div class="row">
            <div class="col-3" >
              <ul class="page-left-menu d-none d-md-block">
                <li><a href="#">樂屋新項目</a></li>
                <li class="left-menu-active"><img src="{{asset('image/skip-track.png')}}"/><a href="#"><a href="#">新聞發佈</a></li>

              </ul>
            </div>
            
            <div class="col-md-9 col-12">
              <p class="title">新聞發佈</p>
              <div class="row">
                <div class="post-content">
                    <div class="post-title"><a href="/press-release/detail?id=64">樂善堂過渡性房屋「樂屋」 - 彩虹彩興路動土禮</a></div>
                    <div class="post-display_at">2023年05月16日</div>
                    <div class="row">
                        <div class="col-sm-8 col-sm-pull-4 col-lg-9 col-lg-pull-3 mt-1">
                          <div class="post-summary">
                            <p>九龍樂善堂（下稱本堂）在房屋局及過渡性房屋專責小組支持和推動下，開展樂善堂過渡性房屋「樂屋」，並於今日舉行「彩虹彩興路樂屋項目」動土禮，由房屋局局長何永賢太平紳士擔任主禮嘉賓。「彩虹彩興路樂屋項目」是樂善堂5年內第12個啟動的過渡性房屋項目。</p>
                            <div class="post-more"><a href="/press-release/detail?id=64">詳情</a></div>
                          </div>
                        </div>

                        <div class="col-sm-4 col-sm-push-8 col-lg-3 col-lg-push-9 mt-1" id="post-image">
                            <div class="post-image mb-3">
                              <a href="/press-release/detail?id=64"><img src="https://www.lsthousing.org/content/blog/image/64.jpg?1684227531" alt=""></a>
                            </div>
                        </div>
                    </div>
                      
              </div>
                
              </div>
            </div>
           
        </div>
    </div>
</section>
@endsection