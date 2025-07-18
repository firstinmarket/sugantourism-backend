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



 <!-- Testimonials Section -->
 <div id="testimonials-section" class="section-content ">
     <div class="bg-white rounded-lg shadow p-6 mb-6">
         <h2 class="text-xl font-bold mb-4">Add New Testimonial</h2>
         <form id="testimonialForm" class="space-y-4">
             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                 <div>
                     <label class="block text-gray-700 mb-2">Name</label>
                     <input type="text" id="testimonialName" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Customer Name">
                 </div>
                 <div>
                     <label class="block text-gray-700 mb-2">Location</label>
                     <input type="text" id="testimonialLocation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="City, Country">
                 </div>
             </div>
             <div>
                 <label class="block text-gray-700 mb-2">Review</label>
                 <textarea id="testimonialText" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="What did they say about us?"></textarea>
             </div>
             <div>
                 <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">
                     Rating *
                 </label>
                 <select
                     id="rating"
                     name="rating"
                     required
                     class="w-full p-2 border rounded-md">
                     <option value="">Select rating</option>
                     <option value="1">Poor</option>
                     <option value="2">Fair</option>
                     <option value="3">Good</option>
                     <option value="4">Very Good</option>
                     <option value="5">Excellent</option>
                 </select>
             </div>

             <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                 <i class="fas fa-save mr-2"></i>Save Testimonial
             </button>
         </form>
     </div>

     <div class="bg-white rounded-lg shadow p-6" id="list_testimonial">
         <h2 class="text-xl font-bold mb-4">Testimonials</h2>
         <div class="" id="testimonialsGrid">
             <!-- Testimonials will be loaded here -->
             <div id="reviews-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div> 
             
             </div>
         </div>
     </div>
 </div>
 </main>
 </div>
 </div>

 <?php include("./components/api.php") ?>
 <!-- post testimonials -->
 <script>
document.getElementById('testimonialForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  
  const name = document.getElementById('testimonialName').value.trim();
  const location = document.getElementById('testimonialLocation').value.trim();
  const review = document.getElementById('testimonialText').value.trim();
  const rating = document.getElementById('rating').value;

  const data = {
    name: name,
    location: location,
    review: review,
    rating: rating
  };

  try {
    const response = await fetch('<?php echo $API; ?>ReviewRoutes.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    if (response.ok) {
      const result = await response.json();
      alert('Testimonial submitted successfully!');
      document.getElementById('testimonialForm').reset();
    } else {
      alert('Something went wrong while submitting your testimonial.');
    }
  } catch (error) {
    alert('Error: ' + error.message);
  }
});
</script>

<!-- get testimonals -->
 

<script>

async function loadReviews() {
  try {
    const res = await fetch("<?php echo $API; ?>ReviewRoutes.php");
    const result = await res.json();

    if (!result.success) {
      console.error("Fetch failed:", result.error || "Unknown error");
      return;
    }

  
    const data = result.data;

    const container = document.getElementById("reviews-container");
    container.innerHTML = "";

    data.forEach(review => {
  
      let stars = "";
      for(let i = 1; i <= 5; i++) {
        stars += `<i class="fas fa-star${i <= review.rating ? '' : '-o'}"></i>`;
      }

     
      const div = document.createElement("div");
      div.className = "border rounded-lg p-4 mb-4";
      div.innerHTML = `
        <div class="flex items-center mb-3">
          <div>
            <h3 class="font-bold">${review.name}</h3>
            <p class="text-sm text-gray-500">${review.location}</p>
          </div>
        </div>
        <p class="text-gray-700 mb-3">"${review.review}"</p>
        <div class="flex justify-between items-center">
          <div class="text-yellow-400">${stars}</div>
          <div>
            <button class="text-red-500 hover:text-red-700" onclick="deleteReview(${review.id})">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      `;
      container.appendChild(div);
    });
  } catch (error) {
    console.error("Error loading reviews:", error);
  }
}

window.onload = loadReviews;


function deleteReview(id) {
 
  if(confirm("Delete this review?")) {
    fetch("<?php echo $API; ?>ReviewRoutes.php?id=" + id, {
      method: "DELETE"
    })
    .then(r => r.json())
    .then(res => {
      if(res.success) {
        loadReviews();
      } else {
        alert("Failed to delete review");
      }
    });
  }
}


</script>


  </main>

</body>
</html> 