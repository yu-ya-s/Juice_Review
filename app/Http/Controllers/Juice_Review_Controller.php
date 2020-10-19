<?php

namespace App\Http\Controllers;

use App\Http\Requests\newJuiceRequest;
use App\Http\Requests\updateJuiceRequest;

use App\Models\Juice_Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Juice_Review_Controller extends Controller
{
    function list(){
        // $userId = Auth::id();
        $juiceList = Juice_Review::orderBy("id","desc")->paginate(8);
        $prefs = config('pref');
        $stars = config('star');
        $keyword = '';
        $none = '';
        return view('juiceList',compact('juiceList','prefs','stars','keyword','none'));
    }

    function upload(newJuiceRequest $request){
        $userId = Auth::id();
        $entry = new Juice_Review();
        $file = $request->file('image');
        // 第一引数はディレクトリの指定
        // 第二引数はファイル
        // 第三引数はpublicを指定することで、URLによるアクセスが可能となる
        $path = Storage::disk('s3')->put('/',$file,'public');
        $entry->image = Storage::disk('s3')->url($path);
        $input = $request->only('name', 'star', 'store','area','review','pref');
        $entry->name = $input["name"];
        $entry->star = $input["star"];
        $entry->store = $input["store"];
        $entry->area = $input["area"];
        $entry->review = $input["review"];
        $entry->prefecture = $input["pref"];
        $entry->user_id = $userId;
        $entry->save();
        return redirect('/');
    }
    
    function newcreate(){
        $prefs=config('pref');
        return view('newJuice',compact('prefs'));
    }

    function details($id){
        $details = Juice_Review::find($id);
        $prefs = config('pref');
        return view('details', compact('details','prefs'));
    }

    function search(Request $request){
        // $userId = Auth::id();
        $none = '';
        $prefs = config('pref');
        $stars = config('star');
        $keyword = $request->input('keyword');
        $local = $request->input('local');
        $pref = $request->input('pref');
        $star = $request->input('star');
        $query = Juice_Review::query();

        // キーワード、ローカル、購入した都道府県で検索
        if (!empty($keyword) && !empty($local) && !empty($pref)) {
            $query->where('name','LIKE',"%{$keyword}%")->where('area',2)->where('prefecture',"$pref");
        // キーワード、購入した都道府県、評価で検索
        }elseif (!empty($keyword) && !empty($pref) && !empty($star)) {
            $query->where('name','LIKE',"%{$keyword}%")->where('prefecture',"$pref")->where('star', '>=', $star);
        // キーワード、ローカル、評価で検索
        }elseif (!empty($keyword) && !empty($local) && !empty($star)) {
            $query->where('name','LIKE',"%{$keyword}%")->where('area',2)->where('star', '>=', $star);
        // ローカル、購入した都道府県、評価で検索
        }elseif (!empty($local) && !empty($pref) && !empty($star)) {
            $query->where('area',2)->where('prefecture',"$pref")->where('star', '>=', $star);
        // キーワード、ローカルで検索
        }elseif (!empty($keyword) && !empty($local)) {
            $query->where('name','LIKE',"%{$keyword}%")->where('area',2);
        // キーワード、購入した都道府県で検索
        }elseif (!empty($keyword) && !empty($pref)) {
            $query->where('name','LIKE',"%{$keyword}%")->where('prefecture',"$pref");
        // キーワード、評価で検索
        }elseif (!empty($keyword) && !empty($star)) {
            $query->where('name','LIKE',"%{$keyword}%")->where('star', '>=', $star);
        // キーワード、購入した都道府県で検索
        }elseif (!empty($local) && !empty($pref)) {
            $query->where('area',2)->where('prefecture',"$pref");
        // ローカル、評価で検索
        }elseif (!empty($local) && !empty($star)) {
            $query->where('area',2)->where('star', '>=', $star);
        // 購入した都道府県、評価で検索
        }elseif (!empty($pref) && !empty($star)) {
            $query->where('prefecture',"$pref")->where('star', '>=', $star);
        // 検索窓に文字が入力されていれば部分一致検索
        }elseif (!empty($keyword)) {
            $query->where('name','LIKE',"%{$keyword}%");
        // ローカルにチェックが入っていれば、ローカルのものだけ表示する
        }elseif(!empty($local)){
            $query->where('area',2);
        // 都道府県を選んで選んだ県で買ったものだけを表示
        }elseif(!empty($pref)){
            $query->where('prefecture',"$pref");
        // 評価で検索
        }elseif(!empty($stars)){
            $query->where('star', '>=', $star);
        }
        // 検索結果をのidを取得し新しい順に表示
        $juiceList = $query->orderBy("id","desc")->paginate(8);
        // 検索結果が0件の場合の処理
        $id = $query->orderBy("id","desc")->count();
        if($id == 0){
            $none = '投稿がありません。';
        }
        return view('juiceList',compact('juiceList','prefs','keyword','stars','none'));
    }

    function delete(Request $request){
        $id = $request->id;
        // s3の画像URLから画像の相対パスのみを抜き出し、s3から削除
        $path = Juice_Review::select(['image'])->where('id',$id)->first();
        $image = substr($path,65);
        $image = str_replace('"}','',$image);
        $disk = Storage::disk('s3');
        $disk->delete($image);
        // DBから、受け取ったIDに対応するジュース情報を削除
        Juice_Review::find($request->id)->delete();
        return redirect('/');
    }

    function edit($id){
        $juice = Juice_Review::find($id);
        $prefs = config('pref');
        return view('juiceUpdate',compact('juice','prefs'));
    }

    function update(updateJuiceRequest $request){
        $id = $request->id;
        $update = [
            'name' => $request->name,
            'star' => $request->star,
            'store' => $request->store,
            'area' => $request->area,
            'prefecture' => $request->pref,
            'review' => $request->review,
        ];
        Juice_Review::where('id', $id)->update($update);
        return redirect('/');
    }

    function myjuice(){
        $userId = Auth::id();
        $prefs = config('pref');
        $stars = config('star');
        $keyword = '';
        $none = '';
        $query = Juice_Review::query();
        $query->where('user_id', $userId);
        $juiceList=$query->orderBy("id","desc")->paginate(8);
        $id = $query->orderBy("id","desc")->count();
        if($id == 0){
            $none = '投稿がありません。';
        }
        return view('juiceList',compact('juiceList','prefs','stars','keyword','userId','none'));
    }
}
