<link rel="stylesheet" href="{{asset('css\newStyle.css')}}">

<header>
    <h1>ジュースレビュー作成</h1>
</header>
<div class="newCreate">
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="image">
            <h4>ジュースの写真を選択してください。</h4>
            <input type="file" name="image">
            <br>
        </div>
        <div class="name">
        <h4>ジュース名</h4>
        <input type="text" name="name" placeholder="ジュース名">
        <br>
        </div>
        <div class="star">
            <h4>評価</h4>
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
            <input type="text" name="store" placeholder="購入店（スーパー、コンビニなど）">
            <br>
        </div>
        <div class="area">
            <h4>全国orご当地</h4>
            <label for="nationwide">全国：</label>
            <input id="nationwide" name="area" type="radio" class="radio" value=1>
            <label for="local">ご当地：</label>
            <input id="local" name="area" type="radio" class="radio" value=2>
            <label for="none">分からない：</label>
            <input id="none" name="area" type="radio" class="radio" value=3>
            <br>
        </div>
        <div class="review">
            <h4>飲んだ感想</h4>
            <textarea name="review" placeholder="感想を入力"></textarea>
            <br>
        </div>
        <button type="submit">投稿</button>
    </form>
</div>