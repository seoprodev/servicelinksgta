<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Service Link GTA | Admin Login</title>
  <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/bundles/bootstrap-social/bootstrap-social.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin-assets/img/favicon.png') }}' />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <style>
    .ajs-message.ajs-visible {
      color: #fff;
      font-size: 15px;
      font-weight: 600;
      border-radius: 25px;
    }
  </style>
</head>

<body>
<div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('admin.login.process') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ asset('admin-assets/js/app.min.js') }}"></script>
  <script src="{{ asset('admin-assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  @if(session('errors'))
    @php
      $validationErrors = session('errors')->all();
    @endphp
    <script>
      @foreach($validationErrors as $error)
      alertify.error('{{$error}}');
      @endforeach
    </script>
  @endif
  @if(session()->has('success'))
    <script>
      alertify.success('{{ session('success') }}')
    </script>
  @endif
  @if(session()->has('error'))
    <script>
      alertify.error('{{ session('error') }}')
    </script>
  @endif


</body>
</html>