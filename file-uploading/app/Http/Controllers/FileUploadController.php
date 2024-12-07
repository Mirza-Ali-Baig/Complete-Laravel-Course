<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function create()
    {
        $images = Image::all();
        return view('upload',compact('images'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate file type and size
        ]);

        // Store the file
//      $path = $request->file('file')->store('uploads', 'public');

//      $path = $request->file('file')->storeAs('uploads', $request->file('file')->getClientOriginalName(), 'public');

        $path = $request->file('file')->move(public_path('uploads'), $request->file('file')->getClientOriginalName());
        // Optionally, store the file path in the database or perform other actions
        Image::create([
            'path' => $path
        ]);

        return back()->with('success', 'File uploaded successfully.')->with('path', $path);
    }
}
