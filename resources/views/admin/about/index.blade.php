@extends('layouts.admin')
@section('title', 'Admin About Index')
@section('content')
    <div class="bg-slate-500 text-center text-white py-4 text-2xl font-bold">
        Admin About Page
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-screen-xl mx-auto mt-20">
        <form action="{{ route('about.create') }}" method="post" enctype="multipart/form-data" class="flex w-full flex-col items-center border rounded-lg p-16 space-y-5">
            @csrf
            <div class="flex flex-col items-center w-full">
                <label for="title" class="font-bold text-white text-2xl">Title</label>
                <input type="text" name="title" id="title" class="bg-transparent outline-none w-full border-b-2 border-white focus:border-blue-500 text-blue-400 font-bold">
            </div>
            <div class="flex flex-col items-center w-full">
                <label for="description" class="font-bold text-white text-2xl">Description</label>
                <textarea name="description" id="description" class="bg-transparent outline-none w-full border-b-2 border-white focus:border-blue-500 text-blue-400 font-bold"></textarea>
            </div>
            <div class="flex space-x-5 items-center">
                <div>
                    <label for="image" class="text-white text-3xl flex flex-col items-center font-bold cursor-pointer bg-slate-500 p-4 rounded-lg"><i class="fa-solid fa-file-arrow-up"></i> Upload Image</label>
                    <input type="file" name="image" id="image" hidden>
                </div>
                <div class="text-white text-2xl font-bold">
                    OR
                </div>
                <div>
                    <label for="images" class="text-white text-3xl flex flex-col items-center font-bold cursor-pointer bg-slate-500 p-4 rounded-lg"><i class="fa-solid fa-file-arrow-up"></i>More Images</label>
                    <input type="file" name="images[]" id="images" hidden multiple/>
                </div>
            </div>
            <div class="w-full">
                <button type="submit" class="bg-slate-500 w-full p-3 text-white font-bold rounded-lg text-lg">ADD</button>
            </div>
        </form>
        <div class="text-center mt-8">
            <a href="{{ route('about.store') }}" class="bg-slate-500 p-5 text-2xl text-white rounded-lg font-bold">Show All Posts</a>
        </div>
    </div>
@endsection
