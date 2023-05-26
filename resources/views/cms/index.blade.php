@extends('layouts.cms')


@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col">
          <button class="btn btn-primary mb-3" id="addNews"><i class="bi bi-file-plus-fill"></i> Add News</button>
          <div class="row">


            <!-- Top Selling -->
            <div class="col-11  ">
              <div class="card top-selling">
                <div class="card-body pb-0">
                  <h5 class="card-title">News Management </h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Is Publish</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($news as $new)
                        <tr>
                          <th scope="row"><a href="#"><img src="{{ asset('uploads/'.$new->image)}}" alt=""></a></th>
                          <td><a href="#" class="text-primary fw-bold">{{ $new->title }}</a></td>
                          <td>{{ $new->author }}</td>
                          <td class="fw-bold">{{ 
                            $new->is_publish==1 ? 'Published' : 'Draft'
                           }}</td>
                          <td>{{ $new->created_at }}</td>
                          {{--edit button--}}
                          <td>
                            <button class="btn btn-primary editNews" data-id="{{ $new->id }}"><i class="bi bi-pencil-square"></i></button>
                          </td>
                          {{--delete button--}}
                          <td>
                            <button class="btn btn-danger deleteNews" data-id="{{ $new->id }}"><i class="bi bi-trash-fill"></i></button>
                          </td>
                        </tr>
                      @endforeach

                      {{-- <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('assets/img/product-2.jpg')}}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('assets/img/product-3.jpg')}}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('assets/img/product-4.jpg')}}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{ asset('assets/img/product-5.jpg')}}" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr> --}}
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

@endsection

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script>
  $(document).ready(function() {

    $('#addNews').click(function() {
      window.location.href = "{{ route('news.create') }}";
    })

    $('.editNews').click(function() {
      var id = $(this).data('id');
      window.location.href = "{{ route('news.edit', ':id') }}".replace(':id', id);
    })

    $('.deleteNews').click(function() {
      var id = $(this).data('id');
      window.location.href = "{{ route('news.delete', ':id') }}".replace(':id', id);
    })
  });
</script>

  