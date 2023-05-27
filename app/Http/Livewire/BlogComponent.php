<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogComponent extends Component
{
  
    use WithFileUploads;

    public $title;
    public $content;
    public $image;
    public $selectedBlog;
    public $isEditing = false;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'image|max:1024', // Adjust the maximum file size as per your requirements
    ];

    public function render()
    {
        $blogs = Blog::all();
        return view('livewire.blog-component', compact('blogs'));
    }

    public function saveBlog()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $imageName = $this->image->store('blog-images', 'public_images');
            $validatedData['image'] = $imageName;
        }

        Blog::create($validatedData);

        $this->resetForm();
    }

    public function editBlog(Blog $blog)
    {
        $this->selectedBlog = $blog;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->isEditing = true;
    }

    public function updateBlog()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $imageName = $this->image->store('blog-images', 'public_images');;
            $validatedData['image'] = $imageName;
        }

        $this->selectedBlog->update($validatedData);

        $this->resetForm();
    }

    public function deleteBlog(Blog $blog)
    {
        $blog->delete();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->image = null;
        $this->selectedBlog = null;
        $this->isEditing = false;
    }
}
