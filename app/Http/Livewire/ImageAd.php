<?php

namespace App\Http\Livewire;

use App\Models\ImageAd as ModelsImageAd;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageAd extends Component
{
    use WithFileUploads;

    public $images = [];
    public $imagesPreview = [];

    public function render()
    {
        $existingImages = ModelsImageAd::all();
        return view('livewire.image-ad', compact('existingImages'));
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // Adjust the validation rules as per your requirements
        ]);

        $this->imagesPreview = [];

        foreach ($this->images as $image) {
            $this->imagesPreview[] = $image->temporaryUrl(); // Store the image previews for display
        }
    }

    public function uploadImages()
    {
        $this->validate([
            'images.*' => 'required', // Add any other validation rules you need
        ]);

        foreach ($this->images as $image) {
            
            $filename = $image->store('ad-images', 'public_images');
            ModelsImageAd::create([
                'filename' => $image->getClientOriginalName(),
                'filepath' => $filename,
            ]);
        }

        // Clear the form after successful upload
        $this->reset(['images', 'imagesPreview']);
    }

    public function removeImage($index)
    {
        unset($this->images[$index]);
        unset($this->imagesPreview[$index]);
        $this->images = array_values($this->images);
        $this->imagesPreview = array_values($this->imagesPreview);
    }

    public function deleteImage($imageId)
    {
        $image = ModelsImageAd::find($imageId);
        if ($image) {
            $image->delete();
        }
    }
}
