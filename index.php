<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sugan Tourism Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            width: 70px;
        }
        .sidebar.collapsed .nav-text {
            display: none;
        }
        .sidebar.collapsed .logo-text {
            display: none;
        }
        .main-content {
            transition: all 0.3s;
        }
        .sidebar.collapsed + .main-content {
            margin-left: 70px;
        }
        .active-nav {
            background-color: #3b82f6;
            color: white !important;
        }
        .active-nav:hover {
            background-color: #3b82f6 !important;
        }
        .ck-editor__editable {
            min-height: 200px;
        }
        .image-preview {
            max-height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 flex flex-col">
            <!-- Logo -->
            <div class="p-4 flex items-center justify-between border-b border-gray-700">
                <div class="flex items-center">
                    <i class="fas fa-mountain-sun text-2xl mr-3"></i>
                    <span class="logo-text text-xl font-bold">Sugan Tourism</span>
                </div>
                <button id="toggleSidebar" class="text-gray-400 hover:text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4">
                <ul>
                    <li>
                        <a href="#" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('dashboard')">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('gallery')">
                            <i class="fas fa-images mr-3"></i>
                            <span class="nav-text">Gallery Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('contact')">
                            <i class="fas fa-address-book mr-3"></i>
                            <span class="nav-text">Contact Info</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('home')">
                            <i class="fas fa-home mr-3"></i>
                            <span class="nav-text">Home Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('bookings')">
                            <i class="fas fa-envelope mr-3"></i>
                            <span class="nav-text">Book Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('testimonials')">
                            <i class="fas fa-star mr-3"></i>
                            <span class="nav-text">Testimonials</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- User Profile -->
            <div class="p-4 border-t border-gray-700 flex items-center">
                <img src="https://via.placeholder.com/40" alt="User" class="rounded-full mr-3">
                <div class="user-info">
                    <div class="font-medium">Admin User</div>
                    <div class="text-sm text-gray-400">admin@sugantourism.com</div>
                </div>
                <a href="#" class="ml-auto text-gray-400 hover:text-white" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content flex-1 overflow-y-auto ml-64">
            <!-- Header -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800" id="sectionTitle">Dashboard</h1>
                <div class="flex items-center">
                    <div class="relative mr-4">
                        <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="relative">
                        <button class="p-2 rounded-full hover:bg-gray-100 relative">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Dashboard Section -->
                <div id="dashboard-section" class="section-content">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
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
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">New Messages</p>
                                    <h3 class="text-2xl font-bold">15</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                                    <i class="fas fa-star text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Testimonials</p>
                                    <h3 class="text-2xl font-bold">42</h3>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                                    <i class="fas fa-users text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500">Visitors Today</p>
                                    <h3 class="text-2xl font-bold">256</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap">+1 234 567 890</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2023-06-15</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap">+1 987 654 321</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2023-06-14</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <button onclick="showSection('gallery')" class="bg-blue-100 text-blue-700 p-4 rounded-lg hover:bg-blue-200 transition flex flex-col items-center">
                                    <i class="fas fa-images text-2xl mb-2"></i>
                                    <span>Add Gallery Item</span>
                                </button>
                                <button onclick="showSection('testimonials')" class="bg-yellow-100 text-yellow-700 p-4 rounded-lg hover:bg-yellow-200 transition flex flex-col items-center">
                                    <i class="fas fa-star text-2xl mb-2"></i>
                                    <span>Add Testimonial</span>
                                </button>
                                <button onclick="showSection('contact')" class="bg-green-100 text-green-700 p-4 rounded-lg hover:bg-green-200 transition flex flex-col items-center">
                                    <i class="fas fa-address-book text-2xl mb-2"></i>
                                    <span>Update Contact</span>
                                </button>
                                <button onclick="showSection('home')" class="bg-purple-100 text-purple-700 p-4 rounded-lg hover:bg-purple-200 transition flex flex-col items-center">
                                    <i class="fas fa-home text-2xl mb-2"></i>
                                    <span>Update Home</span>
                                </button>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="bg-blue-100 text-blue-600 p-2 rounded-full mr-3">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">You added 3 new images to the gallery</p>
                                        <p class="text-sm text-gray-500">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-green-100 text-green-600 p-2 rounded-full mr-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">New booking message from John Doe</p>
                                        <p class="text-sm text-gray-500">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="bg-yellow-100 text-yellow-600 p-2 rounded-full mr-3">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">You published a new testimonial</p>
                                        <p class="text-sm text-gray-500">Yesterday</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Gallery Management Section -->
                <div id="gallery-section" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow p-6 mb-6">
                        <h2 class="text-xl font-bold mb-4">Add New Gallery Item</h2>
                        <form id="galleryForm" class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Category</label>
                                <input type="text" id="galleryCategory" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Cottages, Food, Safari">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Image</label>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <input type="file" id="galleryImage" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                            <i class="fas fa-upload mr-2"></i>Choose Image
                                        </button>
                                    </div>
                                    <div id="imagePreviewContainer" class="hidden">
                                        <img id="imagePreview" src="#" alt="Preview" class="image-preview rounded-lg border">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                                <i class="fas fa-save mr-2"></i>Save Image
                            </button>
                        </form>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold">Gallery Items</h2>
                            <div class="flex space-x-2">
                                <select id="categoryFilter" class="px-3 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">All Categories</option>
                                    <option value="Cottages">Cottages</option>
                                    <option value="Food">Food</option>
                                    <option value="Safari">Safari</option>
                                </select>
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg hover:bg-gray-300">
                                    <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="galleryGrid">
                            <!-- Gallery items will be loaded here -->
                            <div class="border rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x200" alt="Gallery Item" class="w-full h-40 object-cover">
                                <div class="p-3">
                                    <h3 class="font-medium">Cottages</h3>
                                    <div class="flex justify-between mt-2">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x200" alt="Gallery Item" class="w-full h-40 object-cover">
                                <div class="p-3">
                                    <h3 class="font-medium">Food</h3>
                                    <div class="flex justify-between mt-2">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-lg overflow-hidden">
                                <img src="https://via.placeholder.com/300x200" alt="Gallery Item" class="w-full h-40 object-cover">
                                <div class="p-3">
                                    <h3 class="font-medium">Safari</h3>
                                    <div class="flex justify-between mt-2">
                                        <button class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info Section -->
                <div id="contact-section" class="section-content hidden">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h2 class="text-xl font-bold mb-6">Contact Information</h2>
                        <form id="contactForm" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 mb-2">Phone 1</label>
                                    <input type="text" id="phone1" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+1 234 567 890">
                                </div>
                                <div>
                                    <label class="block text-gray-700 mb-2">Phone 2</label>
                                    <input type="text" id="phone2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+1 987 654 321">
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="contact@sugantourism.com">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">WhatsApp Number</label>
                                <input type="text" id="whatsapp" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="+1 234 567 890">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Full Address</label>
                                <textarea id="address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="123 Tourism Street, Vacation City"></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Google Maps Location URL</label>
                                <input type="url" id="location" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://goo.gl/maps/...">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-save mr-2"></i>Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
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
                
                <!-- Testimonials Section -->
                <div id="testimonials-section" class="section-content hidden">
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
                                <label class="block text-gray-700 mb-2">Review Text</label>
                                <textarea id="testimonialText" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="What did they say about us?"></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Image</label>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <input type="file" id="testimonialImage" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                            <i class="fas fa-upload mr-2"></i>Choose Image
                                        </button>
                                    </div>
                                    <div id="testimonialPreviewContainer" class="hidden">
                                        <img id="testimonialPreview" src="#" alt="Preview" class="image-preview rounded-lg border">
                                    </div>
                                </div>
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
                                    <img src="https://via.placeholder.com/50" alt="Customer" class="rounded-full mr-3">
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
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <img src="https://via.placeholder.com/50" alt="Customer" class="rounded-full mr-3">
                                    <div>
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
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">
                                            <i class="fas fa-edit"></i>
                                        </button>
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
    <div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
            <div class="p-6">
                <div class="text-center mb-6">
                    <i class="fas fa-mountain-sun text-5xl text-blue-500 mb-3"></i>
                    <h2 class="text-2xl font-bold">Sugan Tourism Admin</h2>
                    <p class="text-gray-500">Please sign in to continue</p>
                </div>
                <form id="loginForm" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Username</label>
                        <input type="text" id="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your username">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter your password">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Check authentication (in a real app, this would check with the server)
        const isAuthenticated = false; // Change to true after successful login
        
        // Show/hide login modal based on authentication
        const loginModal = document.getElementById('loginModal');
        if (isAuthenticated) {
            loginModal.classList.add('hidden');
        } else {
            loginModal.classList.remove('hidden');
        }
        
        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // In a real app, this would be an API call to your backend
            if (username === 'admin' && password === 'admin123') {
                loginModal.classList.add('hidden');
                // Set authentication flag
                isAuthenticated = true;
            } else {
                alert('Invalid username or password');
            }
        });
        
        // Logout function
        function logout() {
            // In a real app, this would clear the session/token
            isAuthenticated = false;
            loginModal.classList.remove('hidden');
            showSection('dashboard');
        }
        
        // Toggle sidebar collapse
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
        });
        
        // Show/hide sections
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section-content').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show selected section
            document.getElementById(`${sectionId}-section`).classList.remove('hidden');
            
            // Update section title
            let title = 'Dashboard';
            switch(sectionId) {
                case 'gallery': title = 'Gallery Management'; break;
                case 'contact': title = 'Contact Information'; break;
                case 'home': title = 'Home Gallery'; break;
                case 'bookings': title = 'Booking Messages'; break;
                case 'testimonials': title = 'Testimonials'; break;
            }
            document.getElementById('sectionTitle').textContent = title;
            
            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active-nav');
            });
            
            // Find and activate the clicked nav item
            const navItems = document.querySelectorAll('.nav-item');
            for (let i = 0; i < navItems.length; i++) {
                if (navItems[i].getAttribute('onclick').includes(sectionId)) {
                    navItems[i].classList.add('active-nav');
                    break;
                }
            }
        }
        
        // Image preview for gallery upload
        document.getElementById('galleryImage').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('imagePreview').src = event.target.result;
                    document.getElementById('imagePreviewContainer').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Image preview for testimonial upload
        document.getElementById('testimonialImage').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('testimonialPreview').src = event.target.result;
                    document.getElementById('testimonialPreviewContainer').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        
        // View message modal
        function viewMessage(id) {
            // In a real app, this would fetch the message details from the server
            const messageModal = document.getElementById('messageModal');
            messageModal.classList.remove('hidden');
            
            // Sample data - replace with actual data from your database
            if (id === 1) {
                document.getElementById('modalName').textContent = 'John Doe';
                document.getElementById('modalPhone').textContent = '+1 234 567 890';
                document.getElementById('modalEmail').textContent = 'john@example.com';
                document.getElementById('modalDate').textContent = '2023-06-15 14:30';
                document.getElementById('modalAddress').textContent = '123 Main St, New York, NY 10001';
                document.getElementById('modalMessage').textContent = 'I would like to book a cottage for 2 people from June 20-25. Please let me know about availability and pricing.';
            } else {
                document.getElementById('modalName').textContent = 'Jane Smith';
                document.getElementById('modalPhone').textContent = '+1 987 654 321';
                document.getElementById('modalEmail').textContent = 'jane@example.com';
                document.getElementById('modalDate').textContent = '2023-06-14 10:15';
                document.getElementById('modalAddress').textContent = '456 Park Ave, London, UK';
                document.getElementById('modalMessage').textContent = 'Interested in your safari package for a family of 4. What are the available dates in July?';
            }
        }
        
        // Close modal
        function closeModal() {
            document.getElementById('messageModal').classList.add('hidden');
        }
        
        // Form submissions (in a real app, these would send data to your backend)
        document.getElementById('galleryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Gallery item saved! (In a real app, this would save to your database)');
        });
        
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Contact info updated! (In a real app, this would save to your database)');
        });
        
        document.getElementById('homeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Home gallery message updated! (In a real app, this would save to your database)');
        });
        
        document.getElementById('testimonialForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Testimonial saved! (In a real app, this would save to your database)');
        });
        
        // Initialize with dashboard section
        showSection('dashboard');
    </script>
</body>
</html>