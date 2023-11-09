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





    <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Mockups, Logos..." required>
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
@endsection
