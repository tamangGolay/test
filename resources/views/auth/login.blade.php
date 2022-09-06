@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/logo.png') !!}" alt="" width="90" height="97">
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="cid" value="{{ old('cid') }}" placeholder="Cid" required="required" autofocus>
            <label for="floatingName">Cid</label>
            @if ($errors->has('cid'))
                <span class="text-danger text-left">{{ $errors->first('cid') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
        </div>

       
	<button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
        <br><br><button class="w-100 btn btn-lg btn-primary"><a style="color:white;text-decoration:none" href="{{route ('register.show')}}">Sign Up</a>
        </button>
        @include('auth.partials.copy')
    </form>
@endsection
