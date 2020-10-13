<form action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <div class="image">
        <label>ジュースの写真を選択してください。</label><br>
        <input type="file" name="image">
        <br>
    </div>
    <div>
        <label>ジュース名</label><br>
        <input type="text" name="name" placeholder="ジュース名">
        <br>
    </div>
    <div>
        <label>評価</label><br>
        <input id="one" name="star" type="radio" value=1>
        <input id="two" name="star" type="radio" value=2>
        <input id="three" name="star" type="radio" value=3>
        <input id="four" name="star" type="radio" value=4>
        <input id="five" name="star" type="radio" value=5>
        <br>
    </div>
    <div>
        <label>購入店</label><br>
        <input type="text" name="store" placeholder="購入店（スーパー、コンビニなど）">
        <br>
    </div>
    <div>
        <label>全国orご当地</label><br>
        <label for="nationwide">全国：</label><input id="nationwide" name="area" type="radio" value=1>
        <label for="local">ご当地：</label><input id="local" name="area" type="radio" value=2>
        <label for="none">分からない：</label><input id="none" name="area" type="radio" value=3>
        <br>
    </div>
    <div>
        <label>飲んだ感想</label><br>
        <textarea name="review" placeholder="感想を入力"></textarea>
        <br>
    </div>
    <button type="submit">投稿</button>
</form>