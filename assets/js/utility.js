  const isAuthenticated = false; 

        const loginModal = document.getElementById('loginModal');
        if (isAuthenticated) {
            loginModal.classList.add('hidden');
        } else {
            loginModal.classList.remove('hidden');
        }

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === 'admin' && password === 'admin123') {
                loginModal.classList.add('hidden');
                isAuthenticated = true;
            } else {
                alert('Invalid username or password');
            }
        });

        function logout() {
            isAuthenticated = false;
            loginModal.classList.remove('hidden');
            showSection('dashboard');
        }

        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
        });

        function showSection(sectionId) {
            document.querySelectorAll('.section-content').forEach(section => {
                section.classList.add('hidden');
            });

            document.getElementById(`${sectionId}-section`).classList.remove('hidden');

            let title = 'Dashboard';
            switch (sectionId) {
                case 'gallery':
                    title = 'Gallery Management';
                    break;
                case 'contact':
                    title = 'Contact Information';
                    break;
                case 'home':
                    title = 'Home Gallery';
                    break;
                case 'bookings':
                    title = 'Booking Messages';
                    break;
                case 'testimonials':
                    title = 'Testimonials';
                    break;
            }
            document.getElementById('sectionTitle').textContent = title;

            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active-nav');
            });

            const navItems = document.querySelectorAll('.nav-item');
            for (let i = 0; i < navItems.length; i++) {
                if (navItems[i].getAttribute('onclick').includes(sectionId)) {
                    navItems[i].classList.add('active-nav');
                    break;
                }
            }
        }

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

        function viewMessage(id) {
            const messageModal = document.getElementById('messageModal');
            messageModal.classList.remove('hidden');

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

        function closeModal() {
            document.getElementById('messageModal').classList.add('hidden');
        }

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

        showSection('dashboard');