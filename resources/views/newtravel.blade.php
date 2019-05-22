@extends('layouts/app', [
'siteTitle' => 'Új utazás'
])

@section('content')
    <h1>Adj hozzá új utazást!</h1>

    @if($errors->count()>0)
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif

    <form method="POST">
        {{csrf_field()}}
        <div>
            <label for="title">Utazás úticélja: </label>
            <input type="text" name="title" >
        </div>
        <div>
            <label for="content">Utazás leírása: </label>
            <input type="text" name="leiras" >
        </div>

        <div>
            <label for="title">Utazás kezdete </label>
            <input type="date" name="kezdet" >
        </div>
        <div>
            <label for="title">Utazás részeletes leírás </label>
            <textarea name="hosszuleiras"></textarea>
        </div>
        <div>
            <label for="title">Maximum utaslétszám </label>
            <input type="number" name="letszam" >
        </div>
        <div>
            <button type="submit">Mentés</button>
        </div>
    </form>


@endsection