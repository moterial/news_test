@extends('layouts.cms')


@section('content')


<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NewsAdmin</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form method="post" action="{{ route('login.perform') }}" id="loginForm">
                  <input type="hidden" name="_token" value="{{csrf_token()}}" />
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">

                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12 mb-2">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="passwword" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
{{-- 
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div> --}}
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="
                      {{ route('register.show') }}
                      ">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>

            

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->


@endsection

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#loginForm').submit(function(e) {
      e.preventDefault();
      var username = $('#yourUsername').val();
      var password = $('#yourPassword').val();

      $.ajax({
        url: "{{ route('login.perform') }}",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          username: username,
          password: password,
        },
        success: function(response) {
          window.location.href = "{{ route('dashboard.index') }}";
        },
        error: function(response) {
          console.log(response);
        }
      });
    });
  });

</script>

  