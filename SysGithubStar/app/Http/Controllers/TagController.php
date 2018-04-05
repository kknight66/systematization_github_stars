<?php

namespace App\Http\Controllers;

use App\StarTag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{

    //{"tag_name":"python" , "star_id":"1"}
    protected function sync(Request $request)
    {
        $data = $request->all();

        if (Auth::check()) {
            $userId = Auth::id();
            $data["user_id"] = $userId;
            return TagController::sync_($data);
        }else{
            return view('errors.404'); // UnRegister User;
        }

    }

    protected function sync_($data)
    {
        return StarTag::updateOrCreate(['tag_name' => $data['tag_name'],'star_id' => $data['star_id'] ,'user_id' => $data['user_id']],[
            'user_id' => $data['user_id'],
            'star_id' => $data['star_id'],
            'tag_name' => $data['tag_name']]);
    }

    public function getTagDataByUserId($user_id)
    {
        $tag_info = StarTag::where('user_id',$user_id)->get();
        return $tag_info;
    }

    public function getTagDataByUserIdAndStarId($user_id,$star_id)
    {
        $tag_info = StarTag::where('user_id',$user_id)->where('star_id',$star_id)->get();
        return $tag_info;
    }

    /*
    protected function update(Request $request)
    {
        $data = $request->all();
        return StarTag::where('user_id',$data['user_id'])->where('star_id',$data['star_id'])->update(['tag_name' => $data['tag_name']]);
    }

    protected function sync(Request $request)
    {
        $data = $request->all();

        return StarTag::create([
            'user_id' => $data['user_id'],
            'star_id' => $data['star_id'],
            'tag_name' => $data['tag_name']]);
    }
    */
}
