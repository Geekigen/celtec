<x-app-layout>
<h1>Image Ad Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $imageAd->title }}</h5>
            <p class="card-text">Filename: {{ $imageAd->filename }}</p>
            <p class="card-text">Filepath: {{ $imageAd->filepath }}</p>
            <p class="card-text">Link: {{ $imageAd->link }}</p>
        </div>
    </div>

    <a href="{{ route('imageads.edit', $imageAd) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('imageads.destroy', $imageAd) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</x-app-layout>