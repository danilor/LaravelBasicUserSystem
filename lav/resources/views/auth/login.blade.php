<html>
    <head>
        <title>{{ "Login" }}</title>
        @include('templates.includes.headercss')
        <link rel="stylesheet" href="/css/login.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="/img/laravel.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin form_validate" action="#" method="POST">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="username" name="username" class="form-control" placeholder="{{"Username"}}" required="required" autofocus min="2">
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{"Password"}}" required="required" min="2">
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="y" name="remember"> {{ "Remember me" }}
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-login" type="submit">{{ "Login" }}</button>
                </form><!-- /form -->
                <a href="#" class="forgot-password">
                    {{ "Forgot password?"  }}
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->
    </body>
    @include('templates.includes.footerjs')
</html>