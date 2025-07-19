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


        <form id="packageForm" class="max-w-xl mx-auto bg-white rounded-lg shadow p-6 space-y-5">
            <div>
                <label class="block text-gray-700 mb-2 font-semibold">Title</label>
                <input type="text" id="packageTitle" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter package title" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Price (₹)</label>
                    <input type="number" id="packagePrice" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 2999" step="0.01" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Original Price (₹)</label>
                    <input type="number" id="packageOriginalPrice" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 3999" step="0.01">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Duration</label>
                    <input type="text" id="packageDuration" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 2 days 1 night" required>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">Max Guests</label>
                    <input type="number" id="packageMaxGuests" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 6" min="1" required>
                </div>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Location</label>
                <input type="text" id="packageLocation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Yercaud Hills" required>
            </div>
            <div>
                <label class="block text-gray-700 mb-2">Image</label>
                <input type="file" id="packageImage" accept="image/*" class="w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 mb-2">Rating</label>
                    <input type="number" id="packageRating" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., 4.8" step="0.01" min="0" max="5" required>
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
                <textarea id="packageDescription" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Package description..." required></textarea>
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
    </main>


    <script>
        document.getElementById('packageForm').addEventListener('submit', async function(event) {
            event.preventDefault();


            const form = event.target;
            const formData = new FormData();


            formData.append('title', form.querySelector('#packageTitle').value);
            formData.append('price', form.querySelector('#packagePrice').value);
            formData.append('original_price', form.querySelector('#packageOriginalPrice').value);
            formData.append('duration', form.querySelector('#packageDuration').value);
            formData.append('max_guests', form.querySelector('#packageMaxGuests').value);
            formData.append('location', form.querySelector('#packageLocation').value);
            formData.append('image', form.querySelector('#packageImage').files[0]);
            formData.append('rating', form.querySelector('#packageRating').value);
            formData.append('reviews', form.querySelector('#packageReviews').value);
            formData.append('popular', form.querySelector('#packagePopular').value);
            formData.append('description', form.querySelector('#packageDescription').value);
            formData.append('feature1', form.querySelector('#feature1').value);
            formData.append('feature2', form.querySelector('#feature2').value);
            formData.append('feature3', form.querySelector('#feature3').value);
            formData.append('feature4', form.querySelector('#feature4').value);
            formData.append('feature5', form.querySelector('#feature5').value);

            try {
                const response = await fetch('http://localhost/sugan/api/routes/packageRoutes.php', {
                    method: "POST",
                    body: formData
                });
                const result = await response.json();
                if (result.success) {
                    alert('Package added!');
                    form.reset();
                } else {
                    alert(result.error || 'Failed to add package');
                }
            } catch (err) {
                alert('Network or server error!');
            }
        });
    </script>



</body>

</html>