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

    <div class="main-content" style="margin-bottom: 10%">
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

                @foreach($news as $key => $new)
                  <div class="post-content">
                    <div class="post-title"><a href="{{route('news.detail', ['id' => $new['id']])}}">{{$new['title']}}</a></div>
                    <div class="post-display_at">{{$new['updated_at']}}</div>
                    <div class="row">
                      <div class="col-sm-8 col-sm-pull-4 col-lg-9 col-lg-pull-3 mt-1">
                        <div class="post-summary">
                          <p style="white-space: pre-wrap;">{{
                              //first 100 characters of json_decode($new->content)
                              substr(json_decode($new['content']), 0, 400)

                            }}....</p>
                          <div class="post-more"><a href="
                            {{route('news.detail', ['id' => $new['id']])}}
                            ">詳情</a></div>
                        </div>
                      </div>

                      <div class="col-sm-4 col-sm-push-8 col-lg-3 col-lg-push-9 mt-1" id="post-image">
                          <div class="post-image mb-3">
                            <a href="/press-release/detail?id=64"><img src="{{ asset('uploads/'.$new['image'][0]) }}" alt=""></a>
                          </div>
                      </div>
                  </div>
                  </div>
                @endforeach

                
              </div>
            </div>
           
        </div>
    </div>
</section>
@endsection