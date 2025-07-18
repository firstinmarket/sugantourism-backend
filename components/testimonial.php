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

     <div class="bg-white rounded-lg shadow p-6">
         <h2 class="text-xl font-bold mb-4">Existing Testimonials</h2>
         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="testimonialsGrid">
             <!-- Testimonials will be loaded here -->
             <div class="border rounded-lg p-4">
                 <div class="flex items-center mb-3">
                     <div>
                         <h3 class="font-bold">John Doe</h3>
                         <p class="text-sm text-gray-500">New York, USA</p>
                     </div>
                 </div>
                 <p class="text-gray-700 mb-3">"Amazing experience at Sugan Tourism! The cottages were cozy and the safari was unforgettable."</p>
                 <div class="flex justify-between">
                     <div class="text-yellow-400">
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                     </div>
                     <div>

                         <button class="text-red-500 hover:text-red-700">
                             <i class="fas fa-trash"></i>
                         </button>
                     </div>
                 </div>
             </div>
             <div class="border rounded-lg p-4">
                 <div class="flex items-center mb-3">
                     \ <div>
                         <h3 class="font-bold">Jane Smith</h3>
                         <p class="text-sm text-gray-500">London, UK</p>
                     </div>
                 </div>
                 <p class="text-gray-700 mb-3">"The food was absolutely delicious and the staff were so friendly. Will definitely come back!"</p>
                 <div class="flex justify-between">
                     <div class="text-yellow-400">
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star"></i>
                         <i class="fas fa-star-half-alt"></i>
                     </div>
                     <div>

                         <button class="text-red-500 hover:text-red-700">
                             <i class="fas fa-trash"></i>
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </main>
 </div>
 </div>