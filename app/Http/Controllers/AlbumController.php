<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::paginate(5);
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Album::create($request->validate([
            'title' => 'required|string|min:2|max:255',
        ]));

        return to_route('albums.index')->with('success', 'Album created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        // $images = $album->getMedia(collectionName: "$album->title-images");
        $images = $album->getMedia();

        // dd($images);

        return view('albums.show', compact('album', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $album->update($request->validate([
            'title' => 'required|string|min:2|max:255',
        ]));

        return to_route('albums.index')->with('success', 'Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();

        return to_route('albums.index')->with('success', 'Album deleted successfully');
    }

    public function upload(Request $request, Album $album)
    {
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg|max:10000'
            ]);
            // $album->addMedia($request->image)->toMediaCollection("$album->title-photos");
            $album->addMedia($request->image)->toMediaCollection();

        }

        return redirect()->back();
    }

    public function showImage(Album $album, $id)
    {
        $media = $album->getMedia();
        $image = $media->where('id', $id)->first();

        return view('albums.image-show', compact('album', 'image'));
    }

    public function destroyImage(Album $album, $id)
    {
        $media = $album->getMedia();
        $image = $media->where('id', $id)->first();

        $image->delete();

        return redirect()->back();
    }
}
