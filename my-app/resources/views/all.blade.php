@extends('layouts.app')

@section('content')
@foreach ($products1 as $item)
<p>{{ $item['name'] }}</p>
<p>{{ $item['description'] }}</p>
@endforeach
@endsection