<div>
    <input type="text" wire:model="searchTerm" placeholder="Search products...">

    <ul>
        @foreach ($products as $product)
            <li>
                <div>
                    <img src="{{ $product->image_url }}" alt="{{ $product->title }}" width="100" height="100">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Price: ${{ $product->price }}</p>
                    <button style="background-color: yellow;">Add to Cart</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
