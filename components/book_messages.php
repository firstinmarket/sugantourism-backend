<div class="bg-white rounded-lg shadow p-6 mb-6">
  <h2 class="text-xl font-bold mb-4">Recent Book Messages</h2>
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody id="booking-table-body" class="bg-white divide-y divide-gray-200">
        <!--  rows will be injected here -->
      </tbody>
    </table>
  </div>
</div>

<?php include("./components/api.php") ?>

<script>
  async function loadBookings() {
    try {
      const res = await fetch("<?php echo $API; ?>bookingRoutes.php");
      const result = await res.json();

      console.log(result)

      if (!result.success) {
        console.error("Fetch failed:", result.error || "Unknown error");
        return;
      }

           const data = result.bookings.slice(-2).reverse()
      const tbody = document.getElementById("booking-table-body");
      tbody.innerHTML = "";

      data.forEach(booking => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td class="px-6 py-4 whitespace-nowrap">${booking.full_name}</td>
          <td class="px-6 py-4 whitespace-nowrap">${booking.phone}</td>
          <td class="px-6 py-4 whitespace-nowrap">${booking.preferred_dates}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
            <button class="text-red-600 hover:text-red-900">Delete</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    } catch (error) {
      console.error("Error loading bookings:", error);
    }
  }

  window.onload = loadBookings;
</script>
