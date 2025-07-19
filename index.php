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

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                                    <i class="fas fa-images text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Gallery Items</p>
                                    <h3 class="text-2xl font-bold">124</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <a href="./bookings.php">
                                <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">New Messages</p>
                                   
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                                    <i class="fas fa-star text-xl"></i>
                                </div>
                               <a href="./testimonial.php#list_testimonial">
                                 <div>
                                    <p class="text-gray-500">Testimonials</p>
                                    
                                </div>
                               </a>
                            </div>
                        </div>
                       
                    </div>

                   <?php

                   include("./components/book_messages.php")

                   ?>

                  
                <!-- Home Gallery Section -->
                <div id="home-section" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-bold mb-6">Home Gallery Update</h2>
                        <form id="homeForm" class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Gallery Message</label>
                                <textarea id="galleryMessage" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="6" placeholder="Enter your message for the home gallery section...">Welcome to Sugan Tourism! Explore our beautiful cottages, delicious food, and exciting safari adventures through our gallery.</textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-save mr-2"></i>Update Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Book Messages Section -->
                <div id="bookings-section" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold">Booking Messages</h2>
                            <div class="flex space-x-2">
                                <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-download mr-2"></i>Export
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap">+1 234 567 890</td>
                                        <td class="px-6 py-4 whitespace-nowrap">john@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2023-06-15 14:30</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-blue-500 hover:text-blue-700 mr-3" onclick="viewMessage(1)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap">+1 987 654 321</td>
                                        <td class="px-6 py-4 whitespace-nowrap">jane@example.com</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2023-06-14 10:15</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-blue-500 hover:text-blue-700 mr-3" onclick="viewMessage(2)">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <div class="text-sm text-gray-500">
                                Showing 1 to 2 of 2 entries
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border rounded-lg bg-gray-200 text-gray-700" disabled>Previous</button>
                                <button class="px-3 py-1 border rounded-lg bg-blue-500 text-white">1</button>
                                <button class="px-3 py-1 border rounded-lg bg-gray-200 text-gray-700" disabled>Next</button>
                            </div>
                        </div>
                    </div>
                </div>

             

    <!-- Message View Modal -->
    <div id="messageModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
            <div class="flex justify-between items-center border-b p-4">
                <h3 class="text-lg font-bold">Message Details</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="text-gray-500">Name</p>
                        <p id="modalName" class="font-medium">John Doe</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Phone</p>
                        <p id="modalPhone" class="font-medium">+1 234 567 890</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p id="modalEmail" class="font-medium">john@example.com</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Date</p>
                        <p id="modalDate" class="font-medium">2023-06-15 14:30</p>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="text-gray-500">Address</p>
                    <p id="modalAddress" class="font-medium">123 Main St, New York, NY 10001</p>
                </div>
                <div>
                    <p class="text-gray-500">Message</p>
                    <p id="modalMessage" class="font-medium">I would like to book a cottage for 2 people from June 20-25. Please let me know about availability and pricing.</p>
                </div>
            </div>
            <div class="flex justify-end p-4 border-t">
                <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Login Modal (shown when not authenticated) -->
  


</body>

</html>