<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <!-- layui -->
        <link href="{{ asset('layui/css/layui.css') }}" rel="stylesheet">

    </head>
    <style>
        html,body,.layui-container,.layui-row{
            height: 100%;!important;
            width: 100%;
        }
        /*.layui-form-label{
            text-align: center;
        }*/

    </style>
    <body>
<div class="layui-container" style="background: #FFFFFF;padding: 0">
    <div class="layui-header layui-layout layui-layout-admin layui-bg-blue">
        <div class="layui-logo" style="width:35%;color: #FFFFFF;display: flex;align-items: center;justify-content: center"><i style="font-size: 30px;margin-right: 2%" class="layui-icon layui-icon-website"></i>{{ config('app.name', 'Laravel') }}</div>
        {{--<ul class="layui-nav layui-layout-right layui-bg-blue">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退了</a></li>
        </ul>--}}
    </div>



    <div class="layui-row" style="display: flex;justify-content: center;margin-top: 10%">
            <div class="layui-col-md4 layui-col-lg3">
                <div class="layui-card ">
                    <div class="layui-card-header">{{ __('Login') }}</div>
                    <div class="layui-card-body">
                        <form method="POST" class="layui-form" action="{{ route('login') }}" style="padding-right: 18%">
                            @csrf
                            <div class="layui-form-item">
                                <label for="email" class="layui-form-label">
                                    {{ __('E-Mail Address') }}
                                </label>
                                <div class="layui-input-block">
                                    <input class="layui-input" id="email" type="email" {{--class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}} name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label for="password" class="layui-form-label">{{ __('Password') }}</label>
                                <div class="layui-input-block">

                                    <input id="password" type="password" class="layui-input{{--form-control{{ $errors->has('password') ? ' is-invalid' : '' }}--}}" name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <label class="layui-form-label" for="remember"></label>
                                <div class="layui-input-block">
                                    <input type="checkbox" name="remember" lay-skin="primary" id="remember" title=" {{ __('Remember Me') }} " {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <div class="layui-input-block">

                                    @if (Route::has('login'))
                                        @auth
                                        <div style="display: inline-block">
                                            <a class="layui-btn btn-primary" href="{{ url('/home') }}">首页</a>
                                        </div>
                                    @else
                                        <button type="submit" class="layui-btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    @endauth
                                    @endif
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

        {{--layui--}}
        <script src="{{ asset('layui/layui.js') }}" charset="utf-8"></script>
        <script>
            layui.use(['form', 'layedit', 'laydate'], function(){
                var form = layui.form
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;
            })
        </script>
    </body>
</html>
