@extends('layout.master')

@section('posts')
    <h1> All Posts </h1>
    @foreach ($posts as $post)
        {{ $post->id }}
    @endforeach
@endsection
