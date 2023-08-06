<?php

namespace App\Http\Controllers;

use App\Models\ImageAd;
use Illuminate\Http\Request;

class ImageAdcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     // Retrieve all image ads
     $imageAds = ImageAd::all();

     // Return a view to display the image ads
     return view('imageads.index', compact('imageAds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imageads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the input from the create form
        $validatedData = $request->validate([
            'filename' => 'required|image',
            'link' => 'required|string',
            'title' => 'required|string',
        ]);
    
        // Store the uploaded file with a unique filename
        $file = $request->file('filename');
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $image_name);
    
        // Create a new image ad with the validated data
        $imageAd = ImageAd::create([
            'filename' => $image_name,
            'filepath' => 'images/' . $image_name,
            'link' => $validatedData['link'],
            'title' => $validatedData['title'],
        ]);
    
        // Redirect to the index page with a success message
        return redirect()->route('imageads.index')->with('success', 'Image ad created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imageAd= ImageAd::find($id);
     // Return a view to show the details of a specific image ad
     return view('imageads.show', compact('imageAd'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $imageAd =imageAd::findOrFail($id);
        return view('imageads.edit', compact('imageAd'));
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the input from the edit form
    $validatedData = $request->validate([
        'filename' => 'nullable|image',
        'link' => 'required|string',
        'title' => 'required|string',
    ]);

    // Find the image ad by ID
    $imageAd = ImageAd::findOrFail($id);

    // Update the image ad with the validated data
    if ($request->hasFile('filename')) {
        $file = $request->file('filename');
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $image_name);

        // Delete the previous image file if it exists
        if ($imageAd->filename) {
            $previousFilePath = public_path('images/' . $imageAd->filename);
            if (file_exists($previousFilePath)) {
                unlink($previousFilePath);
            }
        }

        $imageAd->filename = $image_name;
        $imageAd->filepath = 'images/' . $image_name;
    }

    $imageAd->link = $validatedData['link'];
    $imageAd->title = $validatedData['title'];
    $imageAd->save();

    // Redirect to the index page with a success message
    return redirect()->route('imageads.index')->with('success', 'Image ad updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImageAd $imageAd)
    {
        $image = ImageAd::find($imageAd);
        if ($image) {
            $image->delete();
        }
      
    }
}
