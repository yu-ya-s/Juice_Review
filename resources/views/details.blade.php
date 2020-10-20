<link rel="stylesheet" href="{{ asset('css\detailsStyle.css') }}">
<header>
    <div class="top">
        <a href="/">
            <p>トップページへ</p>
        </a>
    </div>
    <h1>{{ $details->name }}</h1>
</header>

<body>
    <div class="details">
        <div>
            <img src="{{ $details->image }}" alt="img">
        </div>
        <div>
            <p class="starTitle">評価</p>
            <p>{{ $details->star }}</p>
        </div>
        <div>
            <p class="storeTitle">購入場所</p>
            <p>{{ $details->store }}</p>
        </div>
        <div class="area">
            <p class="areaTitle">全国orご当地</p>
            @if ($details->area == 1)
                <p>全国</p>
            @elseif(($details->area)==2)
                <p>ご当地</p>
            @else(($details->area)==3)
                <p>分からない</p>
            @endif
        </div>
        <div>
            <p class="prefTitle">購入した都道府県</p>
            <p>{{ $prefs["$details->prefecture"] }}</p>
        </div>
        <div>
            <p class="reviewTitle">飲んだ感想</p>
            <p class="review">{{ $details->review }}</p>
        </div>
    </div>
    <div class="button">
        <div>
            <form action="/" method="GET">
                @csrf
                <button type="submit" class="back">戻る</button>
            </form>
        </div>
        <div>
            @if ((Auth::id())==$details->user_id)
            <form action="/edit/{{ $details->id }}" method="GET">
                @csrf
                <input type="submit" value="編集" class="editButton">
            </form>
            @endif
        </div>
        <div>
            @if ((Auth::id())==$details->user_id)
            <form action="/delete/{{ $details->id }}" method="POST">
                @csrf
                <input type="submit" value="削除" class="deleteButton">
            </form>
            @endif
        </div>
    </div>
</body>
<footer>
    <p>©ポートフォリオ</p>
</footer>
