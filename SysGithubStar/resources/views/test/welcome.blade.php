<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SysGitHubStar</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-markdown.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>	
    <script src="{{ asset('js/bootstrap-markdown.js') }}"></script>	
    <!-- 用于支持 app 功能 -->
    <script src="{{ asset('js/search.js') }}"></script>

    <script>
    var root = "{{url('/')}}";
    </script>

    <style>
        html,
        body {
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

        .links>a {
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

        .m-b-md1 {
            margin-bottom: 60px;
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

        <div class="container">
            <div class="content">
                <div class="title m-b-md">
                    SysGitHubStar
                </div>


                <!-- 原型 ： 搜索框 -->
            <div class="row m-b-md1">
                <div class="col-md-8 col-md-offset-2">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">https://api.github.com/users/</span>
                        <input id="gitHubName" type="text" class="form-control" placeholder="Search By Your GitHub UserName ...">
                        <span class="input-group-addon" id="basic-addon3">/starred</span>
                        <span class="input-group-btn">
                            <button id="searchButton" class="btn btn-primary" type="button">
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"> </span>
                                Go To Search
                            </button>
                        </span>
                    </div>
                </div>
            </div>

                <div class="links">
                    <a href="https://github.com/bamboovir/systematization_github_stars/blob/master/README.md">Documentation</a>
                    <a href="https://github.com/bamboovir">Author</a>
                    <a href="https://github.com/bamboovir/systematization_github_stars">InstallVideo</a>
                    <a href="https://github.com/bamboovir/systematization_github_stars">Wiki</a>
                    <a href="https://github.com/bamboovir/systematization_github_stars">GitHub</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- 原型 ： 嵌入照片 -->
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://avatars3.githubusercontent.com/u/20100490?s=400&v=4"
                        data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3>PickledBeef</h3>
                        <p>This is a so amazing website, the genius design and simple design style make the overall software look very advanced.</p>
                        <p>
                            <a href="https://github.com/PickledBeef" class="btn btn-primary" role="button">Go To His GitHub 😄</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://avatars3.githubusercontent.com/u/31264402?s=400&u=e3aaf145557caddce0d5c2d4f88b322269701382&v=4"
                        data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3>kknight66</h3>
                        <p>Exploration is endless, development is endless, innovation is endless.</p>
                        <p>
                            <a href="https://github.com/kknight66" class="btn btn-primary" role="button">Go To His GitHub 😄</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://avatars0.githubusercontent.com/u/35615466?s=400&v=4"
                        data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3>yanyang1019 (yan yang)</h3>
                        <p>Really good!! I am always looking for one website can help me control my GitHub star, this website helped me achieve my dream.</p>
                        <p>
                            <a href="https://github.com/yanyang1019" class="btn btn-primary" role="button">Go To Her GitHub 😄</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://avatars3.githubusercontent.com/u/26778618?s=400&v=4"
                        data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3>HHHHHHHHHH</h3>
                        <p>Free, free, free!!!! say three times because it is important!!!</p>
                        <p>
                            <a href="https://github.com/HHHHHHHHHHHHHHHHHHHHHHHHHHHHHH" class="btn btn-primary" role="button">Go To His GitHub 😄</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://avatars3.githubusercontent.com/u/34639279?s=400&v=4"
                        data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3>Cynthia-Cao</h3>
                        <p>Inadvertently found this site, really easy to use, to provide customers with a better service experience</p>
                        <p>
                            <a href="https://github.com/Cynthia-Cao" class="btn btn-primary" role="button">Go To His GitHub 😄</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="https://avatars0.githubusercontent.com/u/32314427?s=400&v=4"
                        data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                    <div class="caption">
                        <h3>zzqCindy (Zhou, Zhiqian)</h3>
                        <p>I have faith in you; I am sure you will do well in the future!! Star of hope, don't let me down.</p>
                        <p>
                            <a href="https://github.com/zzqCindy" class="btn btn-primary" role="button">Go To His GitHub 😄</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 原型 ：  嵌入视频 -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">How To Install SysGitHubStar</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <script src="https://asciinema.org/a/17648.js" id="asciicast-17648" async></script>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <script src="https://asciinema.org/a/42383.js" id="asciicast-42383" async></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
