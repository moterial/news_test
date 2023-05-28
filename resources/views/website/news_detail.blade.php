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
                <li class="left-menu-active"><img src="{{asset('image/skip-track.png')}}"/><a href="{{route('home.index')}}">新聞發佈</a></li>

              </ul>
            </div>
            
            @isset($news)
            <div class="col-md-9 col-12">
              <p class="title" style="color:#940521;">{{ $news[0]->title }}</p>
              <div class="row">
                <div class="news-content">
                    <p class="news-title text-center">
                        <strong><u>{{ $news[0]->title }}</u></strong>
                    </p>
                    <p style="font-size: 0.9em;" id='news-des' class='mb-5'>
                        @php
                            echo nl2br(json_decode($news[0]->content));
                        @endphp
                    </p>
                    @isset($news[0]->link)
                        <div class="youtube-player mb-5 text-center">
                            <iframe width="80%" height="315" src="{{ 
                                //get the youtube video id from the link
                                'https://www.youtube.com/embed/'.explode('=', $news[0]->link)[1]
                            }}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @endisset
                    @isset($news[0]->image)
                    <div class="image-show row">
                        @foreach($news[0]->image as $key => $image)
                            <div class="col-md-6 col-12 d-flex aligns-items-center justify-content-center mb-5">
                                <img src="{{ asset('uploads/'.$image) }}" alt="" class="" style="display: block;
                                max-width:400px;
                                max-height:200px;
                                width: auto;
                                height: auto;">
                            </div>
                        @endforeach

                    </div>
                    @endisset

                </div>  

              </div>
            </div>
            @endisset
           
        </div>
    </div>
</section>
@endsection

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script>
    $(document).ready(function(){
        //split the news-des with <br> tag and store in array
        var news_des = $('#news-des').html().split('<br>');
        //remove the <br> tag
        $('#news-des').html('');
        //loop through the array and append the <p> tag to each element
        for(var i = 0; i < news_des.length; i++){
            $('#news-des').append('<p>'+news_des[i]+'</p>');
        }

        
        
    });
</script>

