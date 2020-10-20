<link rel="stylesheet" href="{{ asset('css\updateStyle.css') }}">

<header>
    <div class="top">
        <a href="/">
            <p>トップページへ</p>
        </a>
    </div>
    <h1>{{$juice->name}}の編集</h1>
</header>

    <div class="update">
        <form action="/update/{{ $juice->id }}" method="POST">
            @csrf
            <div class="juice">
                <div>
                    <img src="{{ $juice->image }}" alt="img" class="img">
                </div>
                <div>
                    <p class="nameTitle">名前の変更</p>
                    @if ($errors->first('name'))
                        <p class= "validation">{{$errors->first('name')}}</p>
                    @endif
                    <input type="text" name="name" placeholder="ジュース名" value="{{$juice->name}}">
                </div>
                <div>
                    <p class="starTitle">評価</p>
                    @if ($errors->first('star'))
                        <p class= "validation">{{$errors->first('star')}}</p>
                    @endif
                    <label for="one"><span class="text">1:</span></label>
                    <input id="one" name="star" type="radio" class="radio" value=1>
                    <label for="one"><span class="text">2:</span></label>
                    <input id="two" name="star" type="radio" class="radio" value=2>
                    <label for="one"><span class="text">3:</span></label>
                    <input id="three" name="star" type="radio" class="radio" value=3>
                    <label for="one"><span class="text">4:</span></label>
                    <input id="four" name="star" type="radio" class="radio" value=4>
                    <label for="one"><span class="text">5:</span></label>
                    <input id="five" name="star" type="radio" class="radio" value=5>
                </div>
                <div>
                    <p class="storeTitle">購入場所</p>
                    @if ($errors->first('store'))
                        <p class= "validation">{{$errors->first('store')}}</p>
                    @endif
                    <p><input type="text" name="store" value="{{$juice->store}}" placeholder="購入店（スーパー、コンビニなど）"></p>
                </div>
                <div class="area">
                    <p class="areaTitle">全国orご当地</p>
                    @if ($errors->first('area'))
                        <p class= "validation">{{$errors->first('area')}}</p>
                    @endif
                    <label for="nationwide">全国：</label>
                    <input id="nationwide" name="area" type="radio" class="radio" value=1>
                    <label for="local">ご当地：</label>
                    <input id="local" name="area" type="radio" class="radio" value=2>
                    <label for="none">分からない：</label>
                    <input id="none" name="area" type="radio" class="radio" value=3>
                </div>
                <div>
                    <p class="prefTitle">購入した都道府県</p>
                    @if ($errors->first('pref'))
                        <p class= "validation">{{$errors->first('pref')}}</p>
                    @endif
                    <select name="pref">
                        @foreach($prefs as $key => $name)
                            <option value="{{ $key }}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <p class="reviewTitle">飲んだ感想</p>
                    @if ($errors->first('review'))
                        <p class= "validation">{{$errors->first('review')}}</p>
                    @endif
                    <textarea name="review" placeholder="感想を入力">{{ $juice->review }}</textarea>
                </div>
            </div>
            <input type="submit" value="OK" class="updateButton">
        </form>
    </div>
    <div>
        <form action="/" method="GET">
            @csrf
            <button type="submit" class="back">戻る</button>
        </form>
    </div>
</body>
<footer>
    <p>©ポートフォリオ</p>
</footer>