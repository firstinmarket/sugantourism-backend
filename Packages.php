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


  <div class="add_btn flex justify-end ">
 <a href="./AddPackages.php">
     <button class="p-2 rounded bg-gray-800 text-white border  border-gray-800 ">
    Add
  </button>
 </a>
  </div>
<div id="packagesContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5"></div>


  </main>

  <?php include("./components/api.php") ?>
<script>
async function loadPackages() {
    const container = document.getElementById('packagesContainer');
    container.innerHTML = `<div class="col-span-full text-center text-gray-400">Loading...</div>`;
    try {
        const res = await fetch('<?php echo $API; ?>packageRoutes.php');
        const result = await res.json();
        if(result.success && Array.isArray(result.data) && result.data.length > 0) {
            container.innerHTML = '';
            result.data.forEach(pkg => {
                const card = document.createElement('div');
                card.className = 'bg-white shadow rounded-lg p-4 flex flex-col space-y-3';
                card.innerHTML = `
                    <img src="<?php echo $img_path; ?>${pkg.image}" alt="${pkg.title}" class="w-full h-40 object-cover rounded mb-2 border" />
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-lg">${pkg.title}</h3>
                        <span class="text-xs px-2 py-1 rounded ${pkg.popular == 1 ? 'bg-yellow-100 text-yellow-900' : 'bg-gray-200 text-gray-600'}">
                            ${pkg.popular == 1 ? 'Popular' : ''}
                        </span>
                    </div>
                    <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                        <span class="font-semibold text-green-600">₹${pkg.price}</span>
                        ${pkg.original_price && pkg.original_price > pkg.price ? `<span class="line-through text-gray-400">₹${pkg.original_price}</span>` : ''}
                        <span>• ${pkg.duration}</span>
                        <span>• Max: ${pkg.max_guests}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span><i class="fas fa-map-marker-alt mr-1"></i>${pkg.location}</span>
                        <span><i class="fas fa-star text-yellow-500 mr-1"></i>${pkg.rating} (${pkg.reviews})</span>
                    </div>
                    <div class="mt-1 text-gray-700 text-sm line-clamp-2">${pkg.description}</div>
                 <ul class="mt-2 text-gray-700 text-sm space-y-1 list-disc list-inside">
  ${pkg.feature1 ? `<li>${pkg.feature1}</li>` : ''}
  ${pkg.feature2 ? `<li>${pkg.feature2}</li>` : ''}
  ${pkg.feature3 ? `<li>${pkg.feature3}</li>` : ''}
  ${pkg.feature4 ? `<li>${pkg.feature4}</li>` : ''}
  ${pkg.feature5 ? `<li>${pkg.feature5}</li>` : ''}
</ul>

<a href="./updatePackage.php?id=${pkg.id}">
  <button class="p-2 rounded bg-gray-800 text-white border border-gray-800 w-full">Update</button>
</a>
<a onclick="deletePackage(${pkg.id})">
  <button class="p-2 rounded bg-gray-800 text-white border border-gray-800 w-full">Delete</button>
</a>
                `;
                container.appendChild(card);
            });
        } else {
            container.innerHTML = `<div class="col-span-full text-center text-gray-400">No packages found.</div>`;
        }
    } catch (e) {
        container.innerHTML = `<div class="col-span-full text-center text-red-500">Failed to load packages.</div>`;
    }
}

document.addEventListener('DOMContentLoaded', loadPackages);
</script>

<script>
    async function deletePackage(id) {
    if (!confirm('Are you sure you want to delete this package?')) return;

    try {
        const res = await fetch('<?php echo $API; ?>packageRoutes.php?id=' + id, {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/json' }
        });
        const result = await res.json();
        if (result.success) {
            alert('Package deleted successfully!');
            loadPackages(); 
        } else {
            alert('Failed to delete package:\n' + (result.error || 'Unknown error'));
        }
    } catch (e) {
        alert('Network/Delete error!');
    }
}

</script>


</body>
</html> 