 <?php
include("./components/session.php") ;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugan Tourism Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
     <!-- css -->
    <link rel="stylesheet" href="./assets/css/style.css">


    <!-- scripts -->
    <script type="module" src="./assets/js/utility.js"></script>
    <script type="module" src="./assets/js/script.js"></script>

</head>

<body class="bg-gray-100">
   <?php include("./components/sidebar.php") ?>
  <main class="p-6">

                <!-- Gallery Management Section -->
                <div id="gallery-section" class="section-content ">
                    <div class="bg-white rounded-lg shadow p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Add New Gallery Item</h2>
                       <form id="galleryForm" class="space-y-4">
    <div>
        <label class="block text-gray-700 mb-2">Category</label>
        <select required id="galleryCategory" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select category</option>
            <option value="Cottages">Cottages</option>
            <option value="Food">Food</option>
            <option value="Safari">Safari</option>
            <option value="Nature">Nature</option>
            <!-- Add more options as needed -->
        </select>
    </div>
    <div>
        <label class="block text-gray-700 mb-2">Image</label>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input required type="file" id="galleryImage" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    <i class="fas fa-upload mr-2"></i>Choose Image
                </button>
            </div>
            <div id="imagePreviewContainer" class="hidden">
                <img id="imagePreview" src="#" alt="Preview" class="image-preview rounded-lg border">
            </div>
        </div>
    </div>
    <div>
        <label class="block text-gray-700 mb-2">Title</label>
        <input required type="text" id="galleryTitle" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter title">
    </div>
    <div>
        <label class="block text-gray-700 mb-2">Description</label>
        <textarea required id="galleryDescription" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Enter description"></textarea>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
        <i class="fas fa-save mr-2"></i>Save Image
    </button>
</form>

                    </div>

              <div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-bold mb-4">Gallery Items</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="galleryGrid">
        
    </div>
</div>

                </div>

  </main>

<?php include("./components/api.php")?>
  
    <script>
document.getElementById('galleryForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const category    = document.getElementById('galleryCategory').value;
    const imageInput  = document.getElementById('galleryImage');
    const title       = document.getElementById('galleryTitle').value.trim();
    const description = document.getElementById('galleryDescription').value.trim();

    if (!imageInput.files.length) {
        alert('Please choose an image.');
        return;
    }

    const formData = new FormData();
    formData.append('category', category);
    formData.append('title', title);
    formData.append('description', description);
    formData.append('image', imageInput.files[0]);

    try {
        const response = await fetch('<?php echo $API; ?>GalleryRoutes.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            alert('Image uploaded successfully!');
            document.getElementById('galleryForm').reset();
            const previewContainer = document.getElementById('imagePreviewContainer');
            if (previewContainer) previewContainer.classList.add('hidden');
        } else {
            alert(result.error || 'Upload failed.');
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});

document.getElementById('galleryImage').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
        const preview = document.getElementById('imagePreview');
        preview.src = URL.createObjectURL(file);
        document.getElementById('imagePreviewContainer').classList.remove('hidden');
    }
});
</script>

  <script>
async function loadGallery() {
    try {
        const res = await fetch('<?php echo $API; ?>GalleryRoutes.php');
        
        const data = await res.json();
   console.log(data)
        const grid = document.getElementById('galleryGrid');
        grid.innerHTML = '';
  
        if (data.success && data.data.length) {
            data.data.forEach(item => {
                const card = document.createElement('div');
                card.className = 'border rounded-lg overflow-hidden flex flex-col';

                card.innerHTML = `
                    <img src="<?php echo $img_path; ?>${item.image}" alt="${item.title}" class="w-full h-40 object-contain">
                    <div class="p-3 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-medium text-base">${item.title}</h3>
                            <p class="text-sm text-gray-600 mt-1">${item.description}</p>
                            <p class="text-sm text-gray-600 mt-1">${item.category}</p>
                        </div>
                        <div class="flex justify-end space-x-3 mt-3"> 
                            <button class="text-red-500 hover:text-red-700" onclick="deleteReview(${item.id})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
                grid.appendChild(card);
            });
        } else {
            grid.innerHTML = `<div class="col-span-full text-center text-gray-500 py-10">No gallery items found.</div>`;
        }
    } catch (err) {
        document.getElementById('galleryGrid').innerHTML = `<div class="col-span-full text-center text-red-400 py-10">Failed to load gallery.</div>`;
    }
}

window.addEventListener('DOMContentLoaded', loadGallery);


function deleteReview(id) {
 
  if(confirm("Delete this review?")) {
    fetch("<?php echo $API; ?>GalleryRoutes.php?id=" + id, {
      method: "DELETE"
    })
    .then(r => r.json())
    .then(res => {
      if(res.success) {
        loadReviews();
        alert("Success")
      } else {
        alert("Failed to delete review");
      }
    });
  }
}
</script>

</body>
</html> 