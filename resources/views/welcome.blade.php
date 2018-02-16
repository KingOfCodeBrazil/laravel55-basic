<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .help {
                border-radius: 12px;
                background-color: #f1f1f1;
                padding: 30px;
                margin-top: 30px;
                font-family: 'Arial', sans-serif;
            }

            ol {
                text-align: left;
            }

            li {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <div class="m-b-md help">
                    <h4>Steps to run this project:</h4>
                    <br>
                    <ol>
                        <li>Create a new <b>.env</b> file using <b>.env.example</b> file as example. Configure your database on this file.</li>
                        <li>Run <b>composer install</b> to install all PHP libs and the Laravel Framework</li>
                        <li>Run <b>npm install</b> to install all Javascript libs</li>
                        <li>Run <b>npm run dev</b> to compile the Javascript assets</li>
                        <li>Run <b>php artisan key:generate</b> to generate the application key</li>
                        <li>Run <b>php artisan storage:link</b> to craete the symbolic link for file uploads on the public folder</li>
                        <li>Run <b>php artisan migrate:fresh</b> to generate the application key</li>
                        <li>And finally, run <b>php artisan serve</b> to run the application</li>
                        <li>You can access using the user <b>admin@admin.com</b>, with password <b>admin</b>, created with the migrations using the --seed option above.</li>
                    </ol>
                </div>

            </div>
        </div>
    </body>
</html>
