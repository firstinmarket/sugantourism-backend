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
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- scripts -->

    <script type="module" src="./assets/js/script.js"></script>
</head>

<body class="bg-gray-100">
    <?php include("./components/sidebar.php") ?>
    <main class="p-6">

        <form id="packageForm" class="max-w-xl mx-auto bg-white rounded-lg shadow p-6 space-y-5">
            <div>
                <label class="block text-gray-700 mb-2 font-semibold">Title</label>
                <input type="text" value="" id="packageTitle" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter package title">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Price (₹)</label>
                    <input type="number" id="packagePrice" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 2999" step="0.01">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Original Price (₹)</label>
                    <input type="number" id="packageOriginalPrice" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 3999" step="0.01">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Duration</label>
                    <input type="text" id="packageDuration" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 2 days 1 night">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Max Guests</label>
                    <input type="number" id="packageMaxGuests" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 6" min="1">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Location</label>
                <input type="text" id="packageLocation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Yercaud Hills">
            </div>
           
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Rating</label>
                    <input type="number" id="packageRating" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 4.8" step="0.01" min="0" max="5">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Reviews Count</label>
                    <input type="number" id="packageReviews" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 21" min="0">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Popular</label>
                <select id="packagePopular" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Description</label>
                <textarea id="packageDescription" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Package description..."></textarea>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Features (max 5)</label>
                <input type="text" id="feature1" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Feature 1">
                <input type="text" id="feature2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Feature 2">
                <input type="text" id="feature3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Feature 3">
                <input type="text" id="feature4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-2" placeholder="Feature 4">
                <input type="text" id="feature5" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Feature 5">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600"><i class="fas fa-save mr-2"></i>Save Package</button>
            </div>
        </form>
      <form id="packageImageForm" class="max-w-xl mx-auto bg-white rounded-lg shadow p-6 space-y-5 mt-5">
        <div class="">
            <h2>
                Image Update
            </h2>
             <div>
               
                <input type="file" id="packageImage" accept="image/*" class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div id="imagePreview" class="my-2"></div>
            </div>
              <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600"><i class="fas fa-save mr-2"></i>Save Image</button>
            </div>
        </div>
        </form>
    </main>

    <?php include("./components/api.php") ?>
    <?php
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {


            const response = await fetch('<?php echo $API; ?>packageRoutes.php?id=+<?php echo $id; ?>');
            const result = await response.json();
            console.log(result)
            if (!result.success || !result.data) {
                alert("Package not found.");
                return;
            }
            const pkg = result.data;

            document.getElementById('packageTitle').value = pkg.title || '';
            document.getElementById('packagePrice').value = pkg.price || '';
            document.getElementById('packageOriginalPrice').value = pkg.original_price || '';
            document.getElementById('packageDuration').value = pkg.duration || '';
            document.getElementById('packageMaxGuests').value = pkg.max_guests || '';
            document.getElementById('packageLocation').value = pkg.location || '';
            document.getElementById('packageRating').value = pkg.rating || '';
            document.getElementById('packageReviews').value = pkg.reviews || '';
            document.getElementById('packagePopular').value = pkg.popular || "0";
            document.getElementById('packageDescription').value = pkg.description || '';
            document.getElementById('feature1').value = pkg.feature1 || '';
            document.getElementById('feature2').value = pkg.feature2 || '';
            document.getElementById('feature3').value = pkg.feature3 || '';
            document.getElementById('feature4').value = pkg.feature4 || '';
            document.getElementById('feature5').value = pkg.feature5 || '';


            if (pkg.image) {
                let previewDiv = document.getElementById('imagePreview');
                previewDiv.innerHTML = `<img src="<?php echo $img_path; ?>${pkg.image}" class="h-30 w-30 rounded border" alt="Current Image" />`;
            }
        });
    </script>

<!-- update the details -->
    <script>
        document.getElementById("packageForm").addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = {
                title: document.getElementById('packageTitle').value,
                price: document.getElementById('packagePrice').value,
                original_price: document.getElementById('packageOriginalPrice').value,
                duration: document.getElementById('packageDuration').value,
                max_guests: document.getElementById('packageMaxGuests').value,
                location: document.getElementById('packageLocation').value,
                rating: document.getElementById('packageRating').value,
                reviews: document.getElementById('packageReviews').value,
                popular: document.getElementById('packagePopular').value,
                description: document.getElementById('packageDescription').value,
                feature1: document.getElementById('feature1').value,
                feature2: document.getElementById('feature2').value,
                feature3: document.getElementById('feature3').value,
                feature4: document.getElementById('feature4').value,
                feature5: document.getElementById('feature5').value
            };

            try {
                const response = await fetch(`<?php echo $API; ?>packageRoutes.php?id=<?php echo $id; ?>`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formData)
                });
                const result = await response.json();
                if (result.success) {
                    alert("Package updated successfully!");
                } else {
                    alert("Error: " + (result.error || "Failed to update package"));
                }
            } catch (err) {
                alert("Network error: " + err);
            }
        });
    </script>



<script>document.getElementById("packageImageForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append("image", document.getElementById("packageImage").files[0]);

    try {
        const response = await fetch(`<?php echo $API; ?>PackageImg.php?id=<?php echo $id; ?>`, {
            method: "POST", 
            body: formData
           
        });
        const result = await response.json();
        if (result.success) {
            alert("Image updated successfully!");
            document.getElementById("imagePreview").innerHTML = `<img src="<?php echo $img_path; ?>${result.image}" class="h-20 rounded border" alt="Package Image" />`;
        } else {
            alert("Error: " + (result.error || "Image update failed"));
        }
    } catch (err) {
        alert("Network error: " + err);
    }
});

</script>



</body>

</html>