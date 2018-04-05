@extends('layouts.app') @section('content')
<style>
    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .im {
        font-size: 50px;
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


    .links1>a {
        color: #636b6f;
        padding: 0 15px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
        text-align: center;
    }

    .arrtunit {
        padding: 0 18px;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .m-b-md1 {
        margin-bottom: 60px;
    }
</style>

<script>
    var root = "{{url('/')}}";
</script>

<body>
    <div class="flex-center position-ref full-height">

        <div class="container">
            <div class="content">
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
                @guest
                <div class="jumbotron">
                        <h1>Thank You For Trying My Product</h1>
                        <p>You are not a registered user of this site.
                        You can only get instant search results.
                        Anything you do on this site will not be recorded. (For example, any custom tags and descriptions you add to your GitHub Star will not be recorded.)
                        The most important thing is that you will not be able to download your MarkDown files that have been archived offline.
                        This is too bad. Why not try to register for just one minute?
                                : (</p>
                        <p><a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Go To Register</a></p>
                </div>
                @else
                <div class="jumbotron">
                        <h1>Thank You For Trying My Product</h1>
                        <p>Your Could DownLoad Your Customize MarkDown File By Click The Following Button After Search And Tag, Enjoy And Cheers : )</p>
                        <p>
                                <a id="downLoadButton" href="{{route('download')}}" class="btn btn-primary btn-lg" type="button">
                                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"> </span>
                                    DownLoad Your Systematic GitHub Star MarkDown File And Push It To Your GitHub ! 
                                </a>
                        </p>
                </div>
                @endguest

                <div class="im">
                    Go To Search Something
                </div>
            </div>
        </div>

        @endsection