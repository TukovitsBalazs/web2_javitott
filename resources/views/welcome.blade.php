@extends('layouts/app', [
'siteTitle' => 'Főoldal'
])


@section('content')
    <h1>Utazások</h1>

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <div>
        @foreach($travels as $travel)
            <div class="col-auto">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">{{$travel->name}}</h3>
                        <p class="card-text">{{$travel->travelcontent}}</p>
                        <a href="{{ route('bovebben', ['travel' => $travel->id]) }}" class="small">Bővebben</a>
                        <form action="{{ route('jelentkezes', ['travel' => $travel->id]) }}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-primary" type="submit">Jelentkezés</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <ul>
        <li><a href="/newtravel" class="btn btn-primary">Adj hozzá új utat</a></li>
    </ul>
@endsection

