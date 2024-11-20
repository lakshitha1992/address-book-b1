<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find & Add Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom right, #6b73ff, #000dff);
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 20px 40px;
            width: 100%;
            max-width: 500px;
            color: white;
        }

        .d-none {
            display: none !important;
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <h2 class="text-center mb-4">Find Contact</h2>

        <!-- Search Section -->
        <form id="searchForm">
            <div class="mb-3">
                <label for="searchName" class="form-label">Type the Person's Name</label>
                <input type="text" class="form-control" id="searchName" placeholder="Enter name">
            </div>
            <button type="submit" class="btn btn-primary w-100">Find Person</button>
        </form>

        <!-- Notification if not found -->
        <div id="notFoundNotification" class="alert alert-danger d-none mt-3" role="alert">
            Person not found! Do you want to add this person?
            <div class="mt-3">
                <button id="addPersonBtn" class="btn btn-success">Yes</button>
                <button id="cancelBtn" class="btn btn-danger">No</button>
            </div>
        </div>

        <!-- Add Contact Form -->
        <form id="contactForm" class="d-none mt-3" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="text-center mb-4">Add Contact</h2>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country">
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Upload Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary w-100">Save Contact</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const searchForm = document.getElementById('searchForm');
        const contactForm = document.getElementById('contactForm');
        const notFoundNotification = document.getElementById('notFoundNotification');
        const addPersonBtn = document.getElementById('addPersonBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault();

            // Get the name from the input
            const searchName = document.getElementById('searchName').value.trim();

            // AJAX Request to search for the contact
            fetch(`/search-contact/${searchName}`, {
                method: 'GET',
            })
            .then(response => response.json())
            .then(data => {
                if (data.found) {
                    // Fill the contact form with the data
                    document.getElementById('first_name').value = data.contact.first_name;
                    document.getElementById('last_name').value = data.contact.last_name;
                    document.getElementById('email').value = data.contact.email;
                    document.getElementById('phone').value = data.contact.phone;
                    document.getElementById('address').value = data.contact.address;
                    document.getElementById('city').value = data.contact.city;
                    document.getElementById('state').value = data.contact.state;
                    document.getElementById('postal_code').value = data.contact.postal_code;
                    document.getElementById('country').value = data.contact.country;
                    document.getElementById('birthday').value = data.contact.birthday;
                    document.getElementById('notes').value = data.contact.notes;
                    // Hide the search and show the contact form
                    notFoundNotification.classList.add('d-none');
                    contactForm.classList.remove('d-none');
                } else {
                    notFoundNotification.classList.remove('d-none');
                }
            })
            .catch(error => console.error('Error:', error));
        });

        addPersonBtn.addEventListener('click', function () {
            notFoundNotification.classList.add('d-none');
            contactForm.classList.remove('d-none');
        });

        cancelBtn.addEventListener('click', function () {
            notFoundNotification.classList.add('d-none');
        });
    </script>
</body>
</html>
