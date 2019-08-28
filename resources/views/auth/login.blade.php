@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <fieldset class="clearfix">
            <p><span class="fa fa-user"></span><input id="email" type="email" name="email" Placeholder="E-Mail Address" value="{{ old('email') }}" required autofocus></p>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <p><span class="fa fa-lock"></span><input id="password" type="password" name="password" Placeholder="Password" required></p>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
        </fieldset>
        <div class="clearfix"></div>
    </form>
@endsection
