<?php

namespace App\Http\Controllers;

use App\Models\Juice_Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Juice_Review_Controller extends Controller
{
    function index(){
        $juiceList = Juice_Review::orderBy("id","desc")->get();
        return view('juiceList',compact('juiceList'));
    }

    function upload(Request $request){
        {
            $entry = new Juice_Review();
            $file = $request->file('image');
            // 第一引数はディレクトリの指定
            // 第二引数はファイル
            // 第三引数はpublickを指定することで、URLによるアクセスが可能となる
            $path = Storage::disk('s3')->put('/',$file,'public');
            $entry->image = Storage::disk('s3')->url($path);
            $input = $request->only('name', 'star', 'store','area','review');
            $entry->name = $input["name"];
            $entry->star = $input["star"];
            $entry->store = $input["store"];
            $entry->area = $input["area"];
            $entry->review = $input["review"];
            $entry->save();
            return redirect('/');
        }
    }
    
    function newcreate(){
        return view('newJuice');
    }
}
