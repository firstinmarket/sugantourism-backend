
 
 <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 flex flex-col">
            <!-- Logo -->
            <div class="p-4 flex items-center justify-between border-b border-gray-700">
                <a href="./">
                    <div class="flex items-center">
                    <i class="fas fa-mountain-sun text-2xl mr-3"></i>
                    <span class="logo-text text-xl font-bold">Sugan Tourism</span>
                </div>
                </a>
                <button id="toggleSidebar" class="text-gray-400 hover:text-white">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4">
                <ul>
                    <li>
                        <a href="./" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('dashboard')">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="./gallery.php" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('gallery')">
                            <i class="fas fa-images mr-3"></i>
                            <span class="nav-text">Gallery </span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="./bookings.php" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('bookings')">
                            <i class="fas fa-envelope mr-3"></i>
                            <span class="nav-text">Bookings</span>
                        </a>
                    </li>
                    <li>
                        <a href="./Packages.php" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('bookings')">
                           <i class="fa-solid fa-boxes-packing mr-3"></i>
                            <span class="nav-text">Packages</span>
                        </a>
                    </li>

                      <li>
                        <a href="./Inquiries.php" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('bookings')">
                            <i class="fa fa-question-circle mr-3"></i>
                            <span class="nav-text">Inquiries</span>
                        </a>
                    </li>
                    <li>
                        <a href="./testimonial.php" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('testimonials')">
                            <i class="fas fa-star mr-3"></i>
                            <span class="nav-text">Testimonials</span>
                        </a>
                    </li>
                     <li>
                        <a href="./settings.php" class="nav-item flex items-center p-3 hover:bg-gray-700" onclick="showSection('contact')">
                            <i class="fas fa-address-book mr-3"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                    </li> 
                </ul>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-gray-700 flex items-center">
                
                <a href="./components/logout.php" class="ml-auto text-gray-400 hover:text-white" >
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-1 overflow-y-auto ">
            <!-- Header -->
             <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800" id="sectionTitle">Dashboard</h1>
               
            </header>