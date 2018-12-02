<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{ __('Home') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">




                <div class="about-content">
                    <div class="about-big-img">
                        <div class="text_box">
                            <div class="text">
                                <h3>我们的信念</h3>
                                <p>身处在前端社区的繁荣之下，我们都在有意或无意地追逐。而 layui偏偏回望当初，奔赴在返璞归真的漫漫征途，自信并勇敢着，追寻于 原生态的书写指令，试图以最简单的方式诠释高效。
                            </div>
                        </div>
                    </div>
                    <div class="about-info">
                        <div class="img-texts">
                            <div class="item">
                                <div class="layui-fluid">
                                    <div class="layui-row">
                                        <div class="layui-col-xs12 layui-col-sm12 layui-col-md6 img-center">
                                            <img src="../res/static/images/gy_img1.jpg">
                                        </div>
                                        <div class="layui-col-xs12 layui-col-sm12 layui-col-md6">
                                            <div class="text">
                                                <h5>About us</h5>
                                                <h4>关于我们</h4>
                                                <p>如果眼下还是一团零星之火，那运筹帷幄之后，迎面东风，就是一场烈焰燎原吧，那必定会是一番尽情的燃烧。待，秋风萧瑟时，散作满天星辰，你看那四季轮回，正是 layui 不灭的执念。如果眼下还是一团零星之火，那运筹帷幄之后，迎面东风，就是一场烈焰燎原吧，那必定会是一番尽情的燃烧。待，秋风萧瑟时，散作满天星辰，你看那四季轮回，正是 layui 不灭的执念。</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>





















                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs"{{ __('Documentation') }}></a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">{{ __('News') }}</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
