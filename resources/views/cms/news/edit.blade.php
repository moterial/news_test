@extends('layouts.cms')


@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add News</h1>

    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col">
          
          <div class="row">


            <div class="row">
                <div class="col">
        
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Add news Form </h5>
        
                      <!-- General Form Elements -->
                      <form method="post" action="{{ route('news.update',$news->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                          <div class="col-sm-10">
                            @isset($news)
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}">     
                            @else
                                <input type="text" class="form-control" name="title">
                            @endisset
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                          <div class="col-sm-10">
                            @isset($news)
                                <input class="form-control" type="file" name='image' id="formFile" accept=".png, .jpg, .jpeg" value="{{$news->image}}">
                                <img src="{{ asset('uploads/'.$news->image) }}" alt="" width="100px" id="preview-image">
                            @else
                                <input class="form-control" type="file" name='image' id="formFile" accept=".png, .jpg, .jpeg">
                            @endisset
                          </div>
                        </div>


                        <div class="row mb-3">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                          <div class="col-sm-10">
                            @isset($news)
                                <textarea class="form-control" style="height: 100px" name="content">{{ $news->content }}</textarea>
                            @else
                                <textarea class="form-control" style="height: 100px" name="content"></textarea>
                            @endisset
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Youtube link</label>
                            <div class="col-sm-10">
                                @isset($news)
                                    <input type="text" class="form-control" name="link" value="{{ $news->link }}">
                                @else
                                    <input type="text" class="form-control" name="link">
                                @endisset
                            </div>
                        </div>

                        <fieldset class="row mb-3">
                          <legend class="col-form-label col-sm-2 pt-0">Publish</legend>
                          <div class="col-sm-10">
                            <div class="form-check">
                              
                              @isset($news)
                                @if($news->is_publish==1)
                                    <input class="form-check-input" type="radio" name="publish" id="gridRadios1" value='yes' checked>
                                @else
                                <input class="form-check-input" type="radio" name="publish" id="gridRadios1" value='yes'>
                                @endif
                              @else
                              <input class="form-check-input" type="radio" name="publish" id="gridRadios1" value='yes'>
                                @endisset


                              <label class="form-check-label" for="gridRadios1">
                                Yes
                              </label>
                            </div>
                            <div class="form-check">
                                @isset($news)
                                @if($news->is_publish==0)
                                    <input class="form-check-input" type="radio" name="publish" id="gridRadios2" value='no' checked>
                                @else
                                <input class="form-check-input" type="radio" name="publish" id="gridRadios2" value='no'>
                                @endif
                              @else
                              <input class="form-check-input" type="radio" name="publish" id="gridRadios2" value='no'>
                                @endisset
                              <label class="form-check-label" for="gridRadios2">
                                No
                              </label>
                            </div>
                          </div>
                        </fieldset>
                        
                        <input type="hidden" name="author" value="{{ Auth::user()->username }}"> 
        
                        {{-- <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Select</label>
                          <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                              <option selected="">Open this select menu</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                          </div>
                        </div> --}}
        

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Submit</label>
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                          </div>
                        </div>
        
                      </form><!-- End General Form Elements -->
        
                    </div>
                  </div>
        
                </div>
        

              </div>

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

@endsection

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script>
  $(document).ready(function() {

    $('#formFile').change(function(e) {
        //change the preview image
        $('#preview-image').attr('src', URL.createObjectURL(e.target.files[0]));
    });





    
  });
</script>

  