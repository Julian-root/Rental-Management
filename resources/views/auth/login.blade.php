@extends('layouts.auth')

@section('form')

<div class="login-box" style="margin: 0 auto; width: 700px;">
 
    <div  class="login-logo" >
        <a href="#" style="color: #e8cf1c; font-size: 1.8em;"><b style="font-weight:bold;">ADJILAN</b>'MODEL</a>
        <hr/>
    </div>

    <!-- /.login-logo -->
    <div class="card bg-dark card-outline card-primary" style="margin: 0 auto;">
      
      <div class="card-body bg-dark">
      
        <form style="margin: 0 auto;" method="POST" action="{{ route('login') }}">
            @csrf

          <div class="input-group mb-3">
            <input  type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-8" >
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Se souvenir de moi') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </div>
            <!-- /.col -->
            
          </div>
        </form>
  
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  <div class="login-logo " >
    <a href="{{ route('register') }}" style="color: #ccccb9; font-size: 0.65em; font-weight:bold;">Enregistrez-vous</a>
  </div>
  <!-- /.login-box -->
  

@endsection
