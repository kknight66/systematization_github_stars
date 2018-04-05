@extends('layouts.app') 
@section('content')
<style>
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
    var star_json = @json($filted_json_data);
    var tag_json = @json($tag_json_data);
    var user_id = @json($userId);
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
                <p>Your Could DownLoad Your Customize MarkDown File By Click The Following Button After Search And Tag, Enjoy And Cheers : ) </p>
                <p>
                        <a id="downLoadButton" href="{{route('download')}}" class="btn btn-primary btn-lg" type="button">
                            <span class="glyphicon glyphicon-download-alt" aria-hidden="true"> </span>
                            DownLoad Your Systematic GitHub Star MarkDown File And Push It To Your GitHub ! 
                        </a>
                </p>
        </div>
        @endguest
        </div>
        <div class="container">
            @foreach ($filted_json_data as $v)
            <!-- 原型 ： UNIT OF STAR -->
            <div user_id="{{ $v["user_id"] }}" star_id="{{ $v["star_id"] }}" class="panel panel-info" style="margin-bottom:0px;">
                <div class="panel-heading">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 links1" style="top:7px;">
                                <a href="{{ $v["owner_url"] }}" role="button" owner_name_star_id="{{ $v["star_id"] }}" >{{ $v["owner_name"] }}</a>
                                <span style="height:36px;"> / </span>
                                <a href="{{ $v["html_url"] }}" role="button" part_name_star_id="{{ $v["star_id"] }}" >{{ $v["part_name"] }}</a>
                            </div>

                            <div class="col-md-3">
                                <span class="btn btn-link ">Language ：</span>
                                <span language_star_id="{{ $v["star_id"] }}"  class="badge badge-pill badge-dark">{{ $v["language"] }}</span>
                            </div>
                            <div class="col-md-3 ">
                                <span class="btn btn-link ">License ：</span>
                                <span license_star_id="{{ $v["star_id"] }}" class="badge badge-pill badge-dark">{{ $v["license"] }}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="btn btn-link">Stars ：</span>
                                <span star_count_star_id="{{ $v["star_id"] }}" class="badge badge-pill badge-dark">{{ $v["stargazers_count"] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body" style="padding-top: 0px;">
                <div class="row">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">Tags : </span>
                        <input tag_star_id="{{ $v["star_id"] }}" type="text" style="height:34px;" class="form-control" data-role="tagsinput" placeholder="Add Some Useful Tag">
                        <span sync_button_star_id="{{ $v["star_id"] }}" class="input-group-addon btn btn-primary" id="basic-addon3" style=" color: #fff; background-color: #3097d1; border-color: #2a88bd;">
                            Sync This Board
                        </span>
                    </div>
                </div>
                <div class="row">
                    <textarea description_star_id="{{ $v["star_id"] }}" class="target-editor-twitter" name="content"  rows="0">
                        {{ $v["description"] }}
                    </textarea>
                </div>
            </div>
            @endforeach
        </div>





        <!-- 原型 ：用于分页 每页30个 页数太多会混乱 -->
        <nav>
            <div class="links content m-b-md1">
                    <?php /*控制分页标签*/
                    if($page <= 1){ 
                        $prev = 1;
                        $next = 2;
                    }else if($page >= $numOfPage){
                        $prev = $numOfPage - 1;
                        $next = $numOfPage;
                    }else{
                        $prev = $page - 1;
                        $next = $page + 1;
                    }
                    ?>
                <a href="{{ route('searchView',['gitHubName' => $gitHubName, 'page' => $prev]) }}" class=" btn btn-default" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
                @for ($i = 1; $i <= $numOfPage ; $i++) 
                <a href="{{ route('searchView',['gitHubName' => $gitHubName, 'page' => $i]) }}" class="btn btn-default" role="button">{{ $i }}</a>
                @endfor
                    <a href="{{ route('searchView',['gitHubName' => $gitHubName, 'page' => $next]) }}" class="btn btn-default" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
            </div>
        </nav>

        @endsection