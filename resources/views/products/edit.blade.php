<x-app-layout>
    <form action="{{ route('products.update', $Product->id) }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto border border-blue-500 p-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" name="filename[]" id="image" class="form-control-file" accept="image/*" onchange="previewImages(event)" multiple>
            <div id="image-preview-container" class="mt-2"></div>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-auto block w-24">
           Add Images
        </button>
    </form>

    <script>
        function previewImages(event) {
            var files = event.target.files;
            var previewContainer = document.getElementById('image-preview-container');
            previewContainer.innerHTML = "";

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var image = document.createElement('img');
                    image.src = e.target.result;
                    image.classList.add('mt-2');
                    previewContainer.appendChild(image);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
