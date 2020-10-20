<link rel="stylesheet" href="{{asset('css\listStyle.css')}}">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ジュースのレビューサイト</title>
</head>


<header>
    <div class="headmenu">
        <div class="top">
            <a href="/">
                <p>トップページへ</p>
            </a>
        </div>
        <div class="user">
            @auth
            <p>こんにちは！{{Auth::user()->name}}さん！</p>
            <a href={{ route('logout') }} onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <p>ログアウト</p>
            </a>
            <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
            @csrf
            </form>
            @endauth
            @guest
            <a href='/login'>
                <p>ログインはこちら！</p>
            </a>
            <a href='/register'>
                <p>ユーザー新規登録はこちら！</p>
            </a>
            @endguest
        </div>
    </div>
    <div>
        @if (!empty($userName))
            <h1>{{$userName}}さんの投稿</h1>
        @else    
            <h1>ジュースのレビューサイト</h1>
        @endif
    </div>
</header>
<body>    
    <div class="tool">
        <div class="search">
            <form action="/search" method="GET">
                @csrf
                <div class="keyword">
                    <input type="text" name="keyword" value="{{$keyword}}" placeholder="ジュースの名前を入力">
                </div>
                <div class="local">
                    <label for="local">ローカル：</label>
                    <input type="checkbox" name="local" id="local" class="checkbox" value=2>
                </div>
                <div class="pref">
                    <label>購入した都道府県：</label>
                    <select name="pref">
                        @foreach($prefs as $key => $name)
                            <option value="{{$key}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="star">
                    <label>評価：</label>
                    <select name="star">
                        @foreach($stars as $value => $star)
                            <option value="{{$value}}" >{{$star}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="searchButton">
                    <button type="submit">検索</button>
                </div>
            </form>
        </div>
        <div class="button">
            <table>
                <tr>
                    <div class="new">
                        <form action="/new"  method="GET">
                            @csrf
                            <button type="submit">新規投稿</button>
                        </form>
                    </div>
                </tr>
                <tr>
                    <div class="myJuice">
                        <form action="/myjuice" method="GET">
                            @csrf
                            <button type="submit">自分の投稿</button>
                        </form>
                    </div>
                </tr>
            </table>
        </div>
    </div>
    <div class="juice-list">
        <ul>
            @foreach ($juiceList as $image)
            <li>
                <figure>
                    <form action="/details/{{$image->id}}" method="POST">
                    @csrf
                        <input type="image" src="{{$image->image}}" alt="img" class="img">
                        <figcaption class="name">
                            <span>{{$image->name}}</span>
                        </figcaption>
                    </figure>
                </form>
            </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{$juiceList->links('vendor.pagination.default')}}
        </div>
    </div>
    <div class="none">
        <p>{{$none}}</p>
    </div>
</body>
<footer>
    <p>©ポートフォリオ</p>
</footer>
</html>
