<x-app-layout>
    <h1 class="text-3xl font-bold mb-6">Image Ads</h1>

    <a href="{{ route('imageads.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Create New Image Ad</a>

    @if (session('success'))
        <div class="bg-green-200 text-green-800 py-2 px-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imageAds as $imageAd)
                <tr>
                    <td>  <div class="mr-2">
                        <img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="w-20 h-20 object-cover">
                    </div></td>
                    <td class="px-4 py-2">{{ $imageAd->title }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('imageads.show', $imageAd) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">View</a>
                        <a href="{{ route('imageads.edit', $imageAd->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                        <form action="{{ route('imageads.destroy', $imageAd) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
