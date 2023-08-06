<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesComponent extends Component
{
    
    public $name;
    public $categories;
    public $selectedCategory;

  
   
    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories-component');
    }

    public function createCategory()
    {
        $this->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'name' => $this->name,
        ]);

        $this->resetInput();
        $this->categories = Category::all();
    }

    public function editCategory($categoryId)
    {
        $this->selectedCategory = Category::find($categoryId);
        $this->name = $this->selectedCategory->name;
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|unique:categories,name,' . $this->selectedCategory->id,
        ]);

        $this->selectedCategory->update([
            'name' => $this->name,
        ]);

        $this->resetInput();
        $this->categories = Category::all();
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        $this->categories = Category::all();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->selectedCategory = null;
    }
   
}
