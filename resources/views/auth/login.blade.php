@extends('layouts.apps.app')
@section('content')
<div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
    <form class="login-form" method="POST" action="{{route('login')}}" autofill>
      @csrf
        <div class="card card-login card-hidden">
        <div class="card-header card-header-info text-center">
            <h4 class="card-title">Login</h4>
        </div>
        <div class="card-body ">
            <span class="bmd-form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">email</i></span>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" autocomplete="off">
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </span>
            <span class="bmd-form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="material-icons">lock_outline</i></span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" autocomplete="off">
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <input class="form-check-input" type="hidden" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                </div>
            </span>
        </div>
        <div class="card-footer justify-content-center">
            <button class="btn btn-rose btn-link btn-lg" type="submit">Lets Go</button>
        </div>
        </div>
    </form>
</div>
@endsection