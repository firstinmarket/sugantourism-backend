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


  
                <!-- Contact Info Section -->
                <div id="contact-section" class="section-content ">
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

</main>
       
<?php include("./components/api.php")?>
<script>
async function loadContactInfo() {
    try {
        const response = await fetch('<?php echo $API; ?>settingRoutes.php');
        const result = await response.json();

        if (result.success && result.data) {
            const info = Array.isArray(result.data) ? result.data[0] : result.data;
            if (info) {
                document.getElementById('phone1').value    = info.phone1    || '';
                document.getElementById('phone2').value    = info.phone2    || '';
                document.getElementById('email').value     = info.email     || '';
                document.getElementById('whatsapp').value  = info.whatsapp  || '';
                document.getElementById('address').value   = info.address   || '';
                document.getElementById('location').value  = info.location  || '';
            }
        } else {
            alert(result.error || 'Could not load contact information!');
        }
    } catch (err) {
        alert('Failed to fetch contact info: ' + err);
    }
}

window.addEventListener('DOMContentLoaded', loadContactInfo);
</script>


<script>
document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const data = {
        phone1:   document.getElementById('phone1').value.trim(),
        phone2:   document.getElementById('phone2').value.trim(),
        email:    document.getElementById('email').value.trim(),
        whatsapp: document.getElementById('whatsapp').value.trim(),
        address:  document.getElementById('address').value.trim(),
        location: document.getElementById('location').value.trim()
    };

    try {
        const response = await fetch('<?php echo $API; ?>settingRoutes.php', {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        const result = await response.json();
        if (result.success) {
            alert('Contact info updated!');
            loadContactInfo();
        } else {
            alert(result.error || 'Update failed!');
        }
    } catch (err) {
        alert('Error updating contact info: ' + err);
    }
});
</script>



</body>
</html> 