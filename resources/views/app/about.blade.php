@extends('layouts.front')
@section('title', 'About - Home')
@section('content')
    <div class="bg-slate-500 text-center text-white py-4 text-2xl font-bold">
        About Page
    </div>

    <div class="flex justify-center mt-20">
        <div class="flex flex-col items-center justify-center">
            <img src="" class="w-full" alt="">
            <div class="flex flex-col items-center justify-center bg-slate-300 w-full space-y-5 w-72">
                @foreach($abouts as $about)
                    <img src="" class="w-full" alt="">
                    <div class="flex flex-col text-center items-center justify-center px-3">
                        <h1 class="font-bold text-2xl">
                            {{ $about -> title }}
                        </h1>
                        <p>
                            {{ $about -> description}}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
