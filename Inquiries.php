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

<table class="min-w-full divide-y divide-gray-200 border rounded-lg">
  <thead class="bg-gray-100">
    <tr>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Phone</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
      <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Message</th>
    </tr>
  </thead>
  <tbody id="inquiriesTableBody" class="bg-white divide-y divide-gray-100">
    <!-- Data rows will be inserted here -->
  </tbody>
</table>



    </main>

<?php include("./components/api.php") ?>
    <script>
document.addEventListener("DOMContentLoaded", async function() {
    const API_URL = "<?php echo $API; ?>inquiriesRoutes.php";
    const tbody = document.getElementById('inquiriesTableBody');

    try {
        const res = await fetch(API_URL);
        const data = await res.json();

        if (data.success && Array.isArray(data.data)) {
            tbody.innerHTML = '';
            data.data.forEach(inquiry => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-4 py-2 text-sm text-gray-800">${inquiry.name}</td>
                    <td class="px-4 py-2 text-sm text-gray-800">${inquiry.phone}</td>
                    <td class="px-4 py-2 text-sm text-gray-800">${inquiry.email}</td>
                    <td class="px-4 py-2 text-sm text-gray-800">${inquiry.message}</td>
                `;
                tbody.appendChild(row);
            });
        } else {
            tbody.innerHTML = `<tr><td colspan="4" class="px-4 py-2 text-center text-gray-400">No inquiries found.</td></tr>`;
        }
    } catch (error) {
        tbody.innerHTML = `<tr><td colspan="4" class="px-4 py-2 text-center text-red-400">Failed to load inquiries.</td></tr>`;
    }
});
</script>

</body>

</html>