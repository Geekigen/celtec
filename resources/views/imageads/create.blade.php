<x-app-layout>
  <!-- create.blade.php -->

<form action="{{ route('imageads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <label for="filename" class="block text-gray-700">Image:</label>
        <input type="file" name="filename" id="filename" class="form-input rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="link" class="block text-gray-700">Link:</label>
        <input type="text" name="link" id="link" class="form-input rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4">
        <label for="title" class="block text-gray-700">Title:</label>
        <input type="text" name="title" id="title" class="form-input rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>
    </div>

    <div class="mb-4" >
        <img style="height:200px; width:200px; object-fit:contain;" id="image-preview" class="w-full h-auto" alt="Image Preview" style="display: none;">
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
</form>

<script>
    // Image preview
    const imageInput = document.getElementById('filename');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();

        reader.onload = () => {
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    });
</script>

</x-app-layout>
