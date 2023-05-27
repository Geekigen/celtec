<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h5>Filter by Price:</h5>
            <div class="form-group">
                <label for="minPrice">Min Price:</label>
                <input type="number" wire:model="minPrice" id="minPrice" class="form-control" />

                <label for="maxPrice">Max Price:</label>
                <input type="number" wire:model="maxPrice" id="maxPrice" class="form-control" />

                <button wire:click="render" class="btn btn-primary mt-3">Apply Filters</button>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="table-responsive">
                <table class="table table-striped">
                    
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="text-black">
                                        {{ $product->title }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
