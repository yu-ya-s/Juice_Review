<link rel="stylesheet" href="{{asset('css\newStyle.css')}}">
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="{{asset('js\preview.js')}}"></script>

<header>
    <h1>新しいレビューの作成</h1>
</header>
<main>
    <div class="newCreate">
        <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
            <div class="image">
                <h4>ジュースの写真を選択</h4>
                @if ($errors->first('image'))
                    <p class= "validation">{{$errors->first('image')}}</p>
                @endif
                <input type="file" name="image" id="image">
                <br>
            </div>
            <div class="name">
                <h4>ジュース名</h4>
                @if ($errors->first('name'))
                    <p class= "validation">{{$errors->first('name')}}</p>
                @endif
                <input type="text" name="name" placeholder="ジュース名">
                <br>
            </div>
            <div class="star">
                <h4>評価</h4>
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
                <br>
            </div>
            <div class="store">
                <h4>購入店</h4>
                @if ($errors->first('store'))
                    <p class= "validation">{{$errors->first('store')}}</p>
                @endif
                <input type="text" name="store" placeholder="購入店（スーパー、コンビニなど）">
                <br>
            </div>
            <div class="area">
                <h4>全国orご当地</h4>
                @if ($errors->first('area'))
                    <p class= "validation">{{$errors->first('area')}}</p>
                @endif
                <label for="nationwide">全国：</label>
                <input id="nationwide" name="area" type="radio" class="radio" value=1>
                <label for="local">ご当地：</label>
                <input id="local" name="area" type="radio" class="radio" value=2>
                <label for="none">分からない：</label>
                <input id="none" name="area" type="radio" class="radio" value=3>
                <br>
            </div>
            <div>
                <h4>購入した都道府県</h4>
                @if ($errors->first('pref'))
                    <p class= "validation">{{$errors->first('pref')}}</p>
                 @endif
                <select name="pref">
                    @foreach($prefs as $key => $name)
                        <option value="{{ $key }}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="review">
                <h4>飲んだ感想</h4>
                @if ($errors->first('review'))
                    <p class= "validation">{{$errors->first('review')}}</p>
                @endif
                <textarea name="review" placeholder="感想を入力"></textarea>
                <br>
            </div>
            <ul>
                <li>
                    <button type="submit">投稿</button>
                </li>
        </form>
                <li>
                    <form action="/"  method="GET">
                        @csrf
                        <button type="submit" class="back">戻る</button>
                    </form>
                </li>
            </ul>
    </div>
    <div class="preview">
        <img id="preview" title="ここに選択した画像が表示されます。">
    </div>
</main>
<footer>
    <p>©ポートフォリオ</p>
</footer>