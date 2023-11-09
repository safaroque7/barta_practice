@extends('layout.master')

@section('postsDashboard')
    
    <h1> Posts Dashboard </h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <textarea name="title" id="" cols="100%" rows="5" placeholder="What is on your mind"
            class="p-2 block mb-2"></textarea>
        <input type="submit" value="Publish"
            class="bg-gray-500 hover:bg-gray-900 duration:2000 cursor-pointer px-3 py-1 text-white">
    </form>

    @foreach ($data as $item)
        {{ $item->title }}
    @endforeach
@endsection
