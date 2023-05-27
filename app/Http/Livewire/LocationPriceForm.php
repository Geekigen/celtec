<?php

namespace App\Http\Livewire;

use App\Models\LocationPrice;
use Livewire\Component;

class LocationPriceForm extends Component
{
  
    public $location;
    public $price;
    public $editMode = false;
    public $selectedItemId;

    protected $rules = [
        'location' => 'required',
        'price' => 'required|numeric',
    ];

    public function render()
    {
        $locationPrices = LocationPrice::all();

        return view('livewire.location-price-form', [
            'locationPrices' => $locationPrices,
        ]);
    }

    public function save()
    {
        $this->validate();

        LocationPrice::create([
            'location' => $this->location,
            'price' => $this->price,
        ]);

        $this->resetForm();
        return redirect('/location-price');
        session()->flash('message', 'Location and price added successfully!');
    }

    public function edit($itemId)
    {
        $item = LocationPrice::findOrFail($itemId);
        $this->selectedItemId = $item->id;
        $this->location = $item->location;
        $this->price = $item->price;
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate();

        $item = LocationPrice::findOrFail($this->selectedItemId);
        $item->update([
            'location' => $this->location,
            'price' => $this->price,
        ]);

        $this->resetForm();
        return redirect('/location-price');
        session()->flash('message', 'Location and price updated successfully!');
    }

    public function delete($itemId)
    {
        LocationPrice::findOrFail($itemId)->delete();
        return redirect('/location-price');
        session()->flash('message', 'Location and price deleted successfully!');
    }

    private function resetForm()
    {
        $this->reset(['location', 'price', 'editMode', 'selectedItemId']);
    }
}
