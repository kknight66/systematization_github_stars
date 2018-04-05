<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Http\Request;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

class StarController extends Controller
{
    protected function download(Request $request){
        if (Auth::check()) {
            $userId = Auth::id();
            $userName = Auth::user()->name;
            $filename = $userName . '.md';
            $currentStr = StarController::getMarkDownStrByUserId($userId);
            $tempFile = tempnam(sys_get_temp_dir(), $filename);
            file_put_contents($tempFile, $currentStr);
            return response()->download($tempFile, $filename);
        }else{
            return view('errors.404'); // UnRegister User;
        }
    }

    protected function getMarkDownStrByUserId($userId){
        $star_info = StarController::getStarDataByUserId($user_id); // getStarInfoOfUser

        $TagController = new Tagcontroller();
        $tag_info = $TagController->getTagDataByUserId($userId); // getTagInfoOfUser
         
        return "## asd\n---\n-a\n-b\n-c\n";
    }


    protected function viewHome(Request $request){
                    return view('test.testHome');
    }

    protected function viewByUserNameAndPageAndUserId(Request $request,$gitHubName,$page){

        $numOfPage = StarController::getPageNumByGitHubName($gitHubName);
        if (Auth::check()) {
            $userId = Auth::id();
            $filted_json_data = StarController::getJsonByGitHubNameAndPageAndUserId($request,$gitHubName,$page,$userId);
            $TagController = new Tagcontroller();
            $tag_json_data = $TagController->getTagDataByUserId($userId); // 获取Tag 信息 
            return view('test.testForEach',['filted_json_data'=>$filted_json_data , 'tag_json_data' => $tag_json_data, 'gitHubName'=>$gitHubName ,'page'=>$page ,'userId'=>$userId , 'numOfPage'=>$numOfPage]);
        }else{
            $userId = null;
            $tag_json_data = null;
            $filted_json_data = StarController::getJsonByGitHubNameAndPageAndUserId($request,$gitHubName,$page,$userId);
            return view('test.testForEach',['filted_json_data'=>$filted_json_data , 'tag_json_data' => $tag_json_data, 'gitHubName'=>$gitHubName ,'page'=>$page ,'userId'=>$userId , 'numOfPage'=>$numOfPage]);
        }

        /*
        $TagController = new Tagcontroller();
        $tag_json_data = $TagController->getTagDataByUserId($userId); // 获取Tag 信息 
        */
    }

    protected function filtedJsonFromData($unfilted_json_data, $userId = null){
        $filted_json_data = array();
        
                //过滤出需要的JSON
                foreach($unfilted_json_data as $v){
                    $a = array();
                    $a["full_name"]=$v["full_name"];
                    $a["part_name"]=substr($v["full_name"],strpos($v["full_name"],'/') + 1);
                    $a["html_url"]=$v["html_url"];
                    $a["description"]=$v["description"];
                    $a["stargazers_count"]=$v["stargazers_count"];
                    $a["language"]=$v["language"];
                    $a["license"]=$v["license"]["spdx_id"];
                    $a["owner_url"]=$v["owner"]["html_url"];
                    $a["owner_name"]=$v["owner"]["login"];
                    $a['user_id'] = $userId;
                    if($userId != null){
                        $a['star_id'] = $this->sync_($a); // 如果登陆则同步
                    }else{
                        $a['star_id'] = null; //不同步
                    }
                    array_push($filted_json_data,$a);
                }

                return $filted_json_data;
    }

    protected function getJsonByGitHubNameAndPageAndUserId(Request $request,$gitHubName=null,$page=null,$userId = null){

       //伪造请求头
        $fake_header = stream_context_create(
            array(
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );
        //根据 GITHUB DEVELOPER 文档 构造 URL https://api.github.com/users/{UserName}/starred?page={?};
        $url = 'https://api.github.com/users/' . $gitHubName . '/starred' . "?page=" . $page;
        $json = file_get_contents($url,false,$fake_header);
        $unfilted_json_data = json_decode($json, true);
        $filted_json_data = StarController::filtedJsonFromData($unfilted_json_data,$userId);
        return $filted_json_data;
    }

    protected function getPageNumByGitHubName($gitHubName){
    //伪造请求头
    $fake_header = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36",
                'method' => 'GET'
            )
        )
    );
    $url = 'https://api.github.com/users/' . $gitHubName . '/starred';
    $json = file_get_contents($url,false,$fake_header);
    $response_header = $http_response_header;
    $str = $response_header[14];

    $result = array();
    //正则表达式匹配 在page 和 > 之间 匹配 
    //$result[0] 完整匹配 
    //$result[1] 匹配结果
    preg_match_all("/page=(.+?)>/i",$str, $result); 
    
    //返回最大的，即为Last
    return max($result[1]); 
    }

    //{"full_name":"Huiming" , "part_name":"asd" , "html_url":"asd" , "description":"asdfa" , "stargazers_count":123 , "language":"English" , "license":"MIT" , "owner_url":"666" , "owner_name":"666"}
    protected function sync(Request $request)
    {
        $data = $request->all();
        if (Auth::check()) {
            $userId = Auth::id();
            $data["user_id"] = $userId;
            return StarController::sync_($data);
        }else{
            return view('errors.404'); // UnRegister User;
        }

    }

    protected function sync_($data)
    {
        return Star::updateOrCreate(['full_name' => $data['full_name'],'user_id' => $data['user_id']],[
            'full_name' => $data['full_name'],
            'part_name' => $data['part_name'],
            'html_url' => $data['html_url'],
            'description' => $data['description'],
            'stargazers_count' => $data['stargazers_count'],
            'language' => $data['language'],
            'license' => $data['license'],
            'owner_url' => $data['owner_url'],
            'owner_name' => $data['owner_name']])->id;
    }

    protected function getStarDataByUserId($user_id)
    {
        $stars_info = Star::where('user_id',$user_id)->get();
        return $stars_info;
    }
    
    /* UseLess For Learn
    protected function create(Request $request)
    {
        $data = $request->all();

        return Star::create([
            'user_id' => $data['user_id'],
            'full_name' => $data['full_name'],
            'part_name' => $data['part_name'],
            'html_url' => $data['html_url'],
            'description' => $data['description'],
            'stargazers_count' => $data['stargazers_count'],
            'language' => $data['language'],
            'license' => $data['license'],
            'owner_url' => $data['owner_url'],
            'owner_name' => $data['owner_name']]);
    }
    
    protected function create_($data)
    {
        return Star::create([
            'user_id' => $data['user_id'],
            'full_name' => $data['full_name'],
            'part_name' => $data['part_name'],
            'html_url' => $data['html_url'],
            'description' => $data['description'],
            'stargazers_count' => $data['stargazers_count'],
            'language' => $data['language'],
            'license' => $data['license'],
            'owner_url' => $data['owner_url'],
            'owner_name' => $data['owner_name']]);
    }

    protected function update(Request $request)
    {
        $data = $request->all();
        return Star::where('user_id',$data['user_id'])->where('id',$data['id'])
            ->update(['full_name' => $data['full_name'],
            'part_name' => $data['part_name'],
            'html_url' => $data['html_url'],
            'description' => $data['description'],
            'stargazers_count' => $data['stargazers_count'],
            'language' => $data['language'],
            'license' => $data['license'],
            'owner_url' => $data['owner_url'],
            'owner_name' => $data['owner_name']]);
    }

    protected function update_($data)
    {
        
        return Star::where('user_id',$data['user_id'])->where('id',$data['id'])
            ->update(['full_name' => $data['full_name'],
            'part_name' => $data['part_name'],
            'html_url' => $data['html_url'],
            'description' => $data['description'],
            'stargazers_count' => $data['stargazers_count'],
            'language' => $data['language'],
            'license' => $data['license'],
            'owner_url' => $data['owner_url'],
            'owner_name' => $data['owner_name']]);
    }
    */

    /*
    适合本项目的JSON片段：
    - JSON[0].full_name 
    - JSON[0].html_url
    - JSON[0].description
    - JSON[0].stargazers_count
    - JSON[0].language <- tag
    - JSON[2].license.spdx_id <- tag
    - JSON[0].owner.html_url 
    - JSON[0].owner.login 仓库所有者登陆名
    */

    /*
    @font-face {
    font-family: Glyphicons Halflings;
    src: url(../fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.eot?f4769f9bdb7466be65088239c12046d1);
    src: url(../fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.eot?f4769f9bdb7466be65088239c12046d1?#iefix) format("embedded-opentype"), url(../fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.woff2?448c34a56d699c29117adc64c43affeb) format("woff2"), url(../fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.woff?fa2772327f55d8198301fdb8bcfc8158) format("woff"), url(../fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.ttf?e18bbf611f2a2e43afc071aa2f4e1512) format("truetype"), url(../fonts/vendor/bootstrap-sass/bootstrap/glyphicons-halflings-regular.svg?89889688147bd7575d6327160d64e760#glyphicons_halflingsregular) format("svg")
    }
    Save Button
    {JSON[0].owner.html_url:username} / {JSON[0].html_url:reponame} star:JSON[0].stargazers_count
    tags : JSON[0].language JSON[0].license // Can Be Edit
    default description : JSON[0].description // Can Be Edit
    */
}
