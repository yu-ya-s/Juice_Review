<link rel="stylesheet" href="{{asset('css\listStyle.css')}}">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ジュースのレビューサイト</title>
</head>

<body>
<header>
    <h1>ジュースのレビューサイト</h1>
</header>
    <div class="tool">
        <div class="search">
            <form action="/search"  method="GET">
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
                            <option value="{{$key}}" >{{$name}}</option>
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
        <div class="new">
            <form action="/new"  method="GET">
                @csrf
                <button type="submit">投稿</button>
            </form>
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
</body>
<footer>
    <p>©ポートフォリオ</p>
</footer>
</html>
