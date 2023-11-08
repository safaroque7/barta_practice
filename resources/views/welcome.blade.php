@extends('layout.master')

@section('homebody')
    <div class="text-center p-12 border border-gray-800 rounded-xl">
        <h1 class="text-3xl justify-center items-center">Welcome to Barta!</h1>
    </div>

    @auth
        <h1 class="text-center text-1xl"> <span class="font-semibold"> Mr. {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}</span>. You are visting all users' information. </h1>


        {{-- <div class="container">
            <form action="{{ route('search') }}" method="POST" class="flex justify-between">
                @csrf
                <input type="text" name="search" id="search" class="shrink w-100 py-2 px-3">
                <input type="submit" value="Search" class="bg-gray-500 text">
            </form>
        </div> --}}


        <div class="container">
            <h1> Total users are <span class="font-semibold"> {{ DB::table('users')->count() }} </span> </h1>

            <div class="grid grid-cols-2 gap-4">
                @foreach ($users as $user)
                    <div class="border border-gray-500 p-3 bg-gray-50">
                        <div class="mb-5">
                            <h1 class="border-b border-gray-300 mb-1 font-semibold"> ID </h1>
                            <p> {{ $user->id }} </p>
                        </div>

                        <div class="mb-5">
                            <h1 class="border-b border-gray-300 mb-1 font-semibold"> Name </h1>
                            <p> {{ $user->first_name }} {{ $user->last_name }} </p>
                        </div>
                        <div class="mb-5">
                            <h1 class="border-b border-gray-300 mb-1 font-semibold"> Email </h1>
                            <p> {{ $user->email }} </p>
                        </div>

                        <div class="mb-5">
                            <h1 class="border-b border-gray-300 mb-1 font-semibold"> Bio </h1>
                            <p> {{ $user->bio }} </p>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    @endauth
@endsection
