@extends('layouts.cms')


@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      {{-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav> --}}
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row ">
        <div class="col">
          <div class="card" style="width: 350px;">
            <div class="card-body text-center">
              <h5 class="card-title">Profile</h5>
              <div class="row">
                <div class="col text-center">
                  <img src="https://cdn-icons-png.flaticon.com/512/6522/6522516.png" alt="" width="100px">
                </div>
                
              </div>
              <div class="row mb-2">
                <div class="col" style="width: 70%!important">
                    <p class="card-text">
                        <span class="fw-bold">Name: </span>
                        <span class="fw-normal"> {{ $user[0]->username }}</span>
                    </p>
                    <p class="card-text">
                        <span class="fw-bold">Email: </span>
                        <span class="fw-normal"> {{ $user[0]->email }}</span>
                    </p>
                  </div>
              </div>
              {{-- <a href="{{ route('profile.edit',$user[0]->id) }}" class="btn btn-primary">Edit Profile</a> --}}
              {{--change password--}}
              <div class="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                  Change Password
                </button>
              </div>

              </button>
            </div>
          </div>
        </div>
        

        


        
        <div class="modal fade" id="verticalycentered" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Change Password</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.changepw') }}" enctype="multipart/form-data" id="editForm">
                        @csrf
                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Old Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="old_password" value="">     
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="new_password" value="">     
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="confirm_password" value="">     
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9  text-center">
                            <input type="submit" class="btn btn-primary" value="Change Password">     
                        </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        


      </div>
    </section>

  </main><!-- End #main -->

@endsection

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script>
  $(document).ready(function() {

   
  });
</script>

  