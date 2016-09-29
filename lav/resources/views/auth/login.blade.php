@extends('templates.auth')
@section('title')
    {{ "Login" }}
@stop
@section('body')

                <img id="profile-img" class="profile-img-card" src="/img/laravel.png" />
                <p id="profile-name" class="profile-name-card"></p>
                {!! Form::open(array('url' => '/login','class'=>'form_validate form-signin','method'=>'POST')) !!}
                    @if(\Input::get("url") != "")
                        <input type="hidden" name="url" value="{{ \Input::get("url") }}" />
                    @endif
                    <span id="reauth-email" class="reauth-email"></span>

                    {!! Form::text("username",Input::old("username"),["placeholder"=>'Username','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','minlength'=>'6','id'=>'username'])  !!}
                    {!! Form::password("password",["placeholder"=>'Password','class'=>'form-control','required'=>'required','minlength'=>'6','id'=>'password'])  !!}
                    <div id="remember" class="checkbox">
                        <label>
                            {!! Form::checkbox("remember",'y',false) !!}  {{ "Remember me" }}
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">{{ "Login" }}</button>
                {!! Form::close() !!}<!-- /form -->
                <a href="{{ route('forgot_password')  }}" class="forgot-password">
                    {{ "Forgot password?"  }}
                </a>

                @foreach ($errors->all() as $message)
                    <div class="errorblock">
                        {{ $message }}
                    </div>
                @endforeach
                @if(isset($_GET["e"]))
                    <div class="errorblock">
                        {{ "Invalid login information"  }}
                    </div>
                @endif

                @if(isset($_GET["s"]))
                    <div class="errorblock">
                        {{ "Session opened somewhere else"  }}
                    </div>
                @endif

                @if(isset($_GET["snd"]))
                    <div class="successblock">
                        {{ "Your request has been received. If the email correspond to one of our users, an email is going to be send to that address with instructions of how to reset the password."  }}
                    </div>
                @endif


@stop