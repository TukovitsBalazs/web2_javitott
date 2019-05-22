@extends('layouts/app', [
'siteTitle' => 'Utazás részletei'
])


@section('content')
    <h1>Utazás ({{ $travel->name }})</h1>


    <div>
        <div class="col-auto">
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{$travel->name}}</h3>
                    <p class="card-text">{{$travel->leiras}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

