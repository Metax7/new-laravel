@extends('layouts.admin')
@section('title', 'About Store')
@section('content')
    <div class="bg-slate-500 text-center text-white py-4 text-2xl font-bold">Admin About Store</div>
    <div class="max-w-screen-2xl py-8 mx-auto">
        <table class="w-full border border-separate border-spacing-2 border-slate-400 text-center">
            <thead class="text-xl font-bold text-white ">
            <tr class="border-b-2 border-white leading-10 ">
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td>Image</td>
                <td>Images</td>
                <td>Operations</td>
            </tr>
            </thead>
            <tbody>
            @foreach($abouts as $about)
                <tr>
                    <td class="text-white font-bold border-b-2 border-slate-300">{{ $about -> id }}</td>
                    <td class="text-white font-bold border-b-2 border-slate-300">{{ $about -> title }}</td>
                    <td class="text-white font-bold border-b-2 border-slate-300">{{ $about -> description }}</td>
                    <td class="border-b-2 border-slate-300">
                        <img src="{{ asset('/image/'.$about->image) }}" class="w-24 rounded-lg inline" alt="">
                    </td>
                    <td class="border-b-2 border-slate-300">
                        @foreach($about->images as $image)
                            <img src="{{ asset('/storage/' . $image) }}" class="mr-1 p-2 bg-slate-500 w-20 inline rounded-lg" alt="">
                        @endforeach
                    </td>
                    <td>
                        <div class="flex justify-evenly text-3xl">
                            <a href="{{ route('about.edit', $about->id)  }}" class="text-blue-900">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('about.destroy', $about->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
