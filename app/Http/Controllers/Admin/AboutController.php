<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abouts;

//use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'images' => 'nullable|array'
        ]);

        if (isset($data['images'])) {
            $images = [];

            foreach ($data['images'] as $more_image) {
                $fileName = uniqid() . '.' . $more_image->getClientOriginalExtension();
                $image_path = $more_image->storeAs('image', $fileName, 'public');

                array_push($images, $image_path);
            }

            $data['images'] = $images;
        }
        if ($image = $request->file('image')) {
            $destinationPath = './image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        Abouts::create($data);
        return redirect()->route('admin.about.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $abouts = Abouts::all();
        return view('admin.about.store', [
            'abouts' => $abouts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $abouts = Abouts::find($id);
        return view('admin.about.edit', [
            'abouts' => $abouts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $abouts = Abouts::find($id);
        $abouts->title = $request->title;
        $abouts->description = $request->description;

        $image = $request->file('image');

        if (!is_null($image)) {
            if (File::exists(public_path('/image/' . $abouts->image))) {
                File::delete(public_path('/image/' . $abouts->image));
            }
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/image/'), $name);

            $abouts->image = $name;
        }
        $abouts->save();
        return redirect()->route('about.store');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abouts = Abouts::find($id);

        if (File::exists(public_path('/image/' . $abouts->image))) {
            File::delete(public_path('/image/' . $abouts->image));
        }

        if ($abouts->images && is_array($abouts->images)) {
            foreach ($abouts->images as $image_path) {
                if (File::exists(public_path('storage/' . $image_path))) {
                    File::delete(public_path('storage/' . $image_path));
                }
            }
        }

        $abouts->delete();

        return redirect()->route('about.store');
    }
}
