<x-app-layout>
<!-- edit.blade.php -->

<form action="{{ route('imageads.update', ['imagead' => $imageAd->id]) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    @csrf
    @method('PUT')

    <div class="mb-6">
        <label for="filename" class="block text-gray-700">Image:</label>
        <input type="file" name="filename" id="filename" class="form-input mt-1 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" accept="image/*">
        <small class="text-gray-500">Leave empty to keep the existing image.</small>
    </div>

    <div class="mb-6">
        <label for="link" class="block text-gray-700">Link:</label>
        <input type="text" name="link" id="link" class="form-input mt-1 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $imageAd->link }}" required>
    </div>

    <div class="mb-6">
        <label for="title" class="block text-gray-700">Title:</label>
        <input type="text" name="title" id="title" class="form-input mt-1 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500" value="{{ $imageAd->title }}" required>
    </div>

    <div class="mb-6">
        <img id="image-preview" class="w-full h-auto" alt="Image Preview" style="display: none;">
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
</form>

<script>
    // Image preview
    document.getElementById('filename').addEventListener('change', function (e) {
        const imagePreview = document.getElementById('image-preview');
        imagePreview.style.display = 'block';
        imagePreview.src = URL.createObjectURL(e.target.files[0]);
    });
</script>


</x-app-layout>