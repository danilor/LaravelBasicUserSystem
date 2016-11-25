@extends('templates.auth')
@section('title')
    {{ "Forgot Password" }}
@stop
@section('body')
                <img id="profile-img" class="profile-img-card" src="/img/laravel.png" />
                <p id="profile-name" class="profile-name-card"></p>
                {!! Form::open(array('url' => '/forgot_password','class'=>'form_validate form-signin formSubmitPageBlock','method'=>'POST')) !!}
                    <p>
                        {{ "Please enter your email"  }}
                    </p>
                    {!! Form::email("email",Input::old("email"),["placeholder"=>'Email','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','id'=>'email'])  !!}
                    <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">{{ "Recover" }}</button>
                {!! Form::close() !!}<!-- /form -->
                <a href="{{ route('login')  }}" class="forgot-password">
                    {{ "Login"  }}
                </a>
                @foreach ($errors->all() as $message)
                    <div class="errorblock">
                        {{ $message }}
                    </div>
                @endforeach

@stop