<link rel="stylesheet" href="{{asset('css\detailsStyle.css')}}">
<h1>{{$details->name}}</h1>
<body>
    <div>
        <div>
            <img src="{{$details->image}}" alt="img" class="img">
        </div>
        <div>
            <p>評価：{{$details->star}}</p>
        </div>
        <div>
            <p>購入場所：{{$details->store}}</p>
        </div>
        <div>
            <p>全国orローカル：
            @if (($details->area)==1)
                <span>全国</span>
            @elseif(($details->area)==2)
                <span>ローカル</span>
            @else(($details->area)==2)
                <span>分からない</span>
            @endif
            </p>
        </div>
        <div>
            <p>飲んだ感想</p>
            <p>{{$details->review}}</p>
        </div>
    </div>
    <div>
        <form action="/"  method="GET">
            @csrf
            <button type="submit"  class="back">戻る</button>
        </form>
    </div>


</body>