<html>
    <head>
        <title>
            @yield('title')
        </title>
        @include('templates.includes.headercss')
        <link rel="stylesheet" href="/css/login.css" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="card card-container">
               @yield('body')
            </div><!-- /card-container -->
        </div><!-- /container -->
    </body>
    @include('templates.includes.footerjs')
</html>