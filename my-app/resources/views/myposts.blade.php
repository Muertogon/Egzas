@extends('layouts.app')

@section('content')
@foreach ($posts as $item)
    @php
        $id = $item->id;
    @endphp
<div class="container w-100 align-items-center">
    <div class="card justify-content-center " id="cardu">
        <div class="card-header">
            {{ $item->name }}
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{ $item->description }}</p>
                <footer>{{ $item->category }}</footer>
            </blockquote>
        </div>
    </div>
    <a href="/del/{{ $id }}" class="btn btn-danger">Delete</a>
</div>
@endforeach

@endsection