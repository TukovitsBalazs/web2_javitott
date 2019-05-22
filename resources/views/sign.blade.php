@extends('layouts/app', [
    'siteTitle' => 'Regisztráció'
])

@section('content')
    @if($errors->count()>0)
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif

    <form method="POST">
        {{csrf_field()}}
        <div>
            <label for="name">Jelentkező neve: </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="content">Email cím: </label>
            <input name="content" name="email" type="email">
        </div>
        <div>
            <label for="password">Jelszó: </label>
            <input type="password" name="password">
        </div>

        <div>
            <button type="submit">Mentés</button>
        </div>
    </form>
@endsection