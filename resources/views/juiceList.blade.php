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
    <div class="new">
        <form action="/new"  method="GET">
            @csrf
            <button type="submit">投稿</button>
        </form>
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
    </div>


</body>

</html>
