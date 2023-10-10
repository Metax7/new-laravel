@extends('layouts.admin')
@section('title', 'About Edit Page')
@section('content')
    <div class="bg-slate-500 text-center text-white py-4 text-2xl font-bold">
        Admin Edit Page <span class="text-red-600 font-black">{{ $abouts->id }}</span> Post
    </div>
    <div class="max-w-screen-xl mx-auto mt-20">
        <form
            action="{{ route('about.update', $abouts->id) }}"
            method="post"
            enctype="multipart/form-data"
            class="flex w-full flex-col items-center border rounded-lg p-16 space-y-5">
            @method('PUT')
            @csrf
            <div class="flex flex-col items-center w-full">
                <label for="title" class="font-bold text-white text-2xl">Title</label>
                <input type="text" name="title" id="title" value="{{ $abouts -> title }}"
                       class="bg-transparent outline-none w-full border-b-2 border-white focus:border-blue-500 text-blue-400 font-bold">
            </div>
            <div class="flex flex-col items-center w-full">
                <label for="description" class="font-bold text-white text-2xl">Description</label>
                <textarea name="description" id="description" cols="30" rows="6"
                          class="bg-transparent outline-none w-full border-b-2 border-white focus:border-blue-500 text-blue-400 font-bold">{{ $abouts -> description }}</textarea>
            </div>
            <div>
                <label for="img"
                       class="text-white text-3xl flex flex-col items-center font-bold cursor-pointer bg-slate-500 p-4 rounded-lg">
                    <img src="{{ asset('/image/'.$abouts -> image) }}" class="w-36" id="preview" alt="">
                </label>
                <input type="file" name="image" id="img" hidden>
            </div>
            <div>
                <label for="img2"
                       class="text-white text-3xl flex space-x-5 items-center font-bold cursor-pointer rounded-lg">
                    @foreach($abouts->images as $image)
                        <img src="{{ asset('/storage/' . $image) }}" class="bg-slate-500 w-20 rounded-lg p-2" id="preview2" alt="">
                    @endforeach
                </label>
                <input type="file" name="images[]" id="img2" hidden>
            </div>
            <div class="w-full">
                <button type="submit" class="bg-slate-500 w-full p-3 text-white font-bold rounded-lg text-lg">
                    ADD
                </button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript">
        $(function (){
            $('#img').on('change', function (e){
                const blobUrl = URL.createObjectURL(e.target.files[0])
                $('#preview').attr('src', blobUrl)
            })
        })
    </script>
@endsection
