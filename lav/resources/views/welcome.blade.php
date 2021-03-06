<!DOCTYPE html>
<html>
    <head>
        <title>{{"Laravel"}}</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <style>
            html, body { height: 100%; }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }
            .content {
                text-align: center;
                display: inline-block;
            }
            .title { font-size: 96px; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{"Laravel 5"}}</div>
                @if(Auth::check())
                <p>
                    {{ "Welcome"  }} {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                </p>
                <p>
                    <a href='{{ route('logout')  }}'>Logout</a>
                </p>

                @else
                    <p>Welcome. Please <a href="{{ route('login')  }}">login</a> so we can know who you are</p>
                @endif
            </div>
        </div>
    </body>



</html>
