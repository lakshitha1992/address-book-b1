# Address Book Application

This is a simple **Address Book** web application built using **Laravel**. It allows users to manage contacts, including their personal details and photos. It also features user authentication (login/register) functionality.

## Features

- **User Authentication**: Login and registration functionality using Laravel's built-in authentication system.
- **Contact Management**: Create, view, and search for contacts, including the ability to upload and store contact photos.
- **Search Contacts**: Search for contacts by first or last name.
- **File Uploads**: Upload and store photos associated with contacts.

## Project Links

- **GitHub Repository**: [Address Book Project](https://github.com/lakshitha1992/address-book-b1)
- **Author GitHub Profile**: [Lakshitha1992](https://github.com/lakshitha1992)

## Prerequisites

Before you begin, ensure you have the following installed:

- PHP >= 7.4
- Composer
- Laravel 8.x or above
- MySQL or another supported database

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/lakshitha1992/address-book-b1.git
cd address-book-b1

2. Install Dependencies
Run the following command to install the necessary PHP dependencies:

bash
Copy code
composer install
3. Set up Environment
Create a copy of the .env.example file and rename it to .env:

bash
Copy code
cp .env.example .env
Update the .env file with your database credentials:

plaintext
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=address_book
DB_USERNAME=root
DB_PASSWORD=
4. Generate Application Key
Run the following command to generate the application key:

bash
Copy code
php artisan key:generate
5. Run Migrations
Set up the database tables by running the migrations:

bash
Copy code
php artisan migrate
6. Seed the Database (Optional)
You can optionally seed the database with some initial data:

bash
Copy code
php artisan db:seed
Routes Overview
Home Route: / - Displays the home page of the application.
Login Routes:
GET /login - Displays the login form.
POST /login - Handles the login request.
POST /logout - Logs the user out.
Register Routes:
GET /register - Displays the registration form.
POST /register - Handles the registration request.
Contact Routes:
GET /contact/create - Displays the form to create a new contact.
POST /contact/store - Handles the creation of a new contact.
GET /search-contact/{name} - Searches for contacts by name.
File Structure
Here’s an overview of the key directories and files in the project:

bash
Copy code
app/
  Http/
    Controllers/
      ContactController.php  # Handles contact creation, storing, and searching
      Auth/
        LoginController.php  # Handles login functionality
        RegisterController.php  # Handles registration functionality
resources/
  views/
    welcome.blade.php  # Welcome page view
    contact/
      create.blade.php  # Form for creating a new contact
routes/
  web.php  # Defines the routes for the application
.env  # Environment configuration file
Technologies Used
Laravel 8.x: The backend framework used to build this application.
MySQL: The database system for storing user and contact data.
Blade: Laravel's templating engine used for the views.
Bootstrap: The frontend framework used for styling the views.
Contributing
Feel free to fork this project and make improvements! If you encounter any issues or have suggestions for new features, please open an issue or submit a pull request.

License
This project is open-source and available under the MIT License.

Icons

vbnet
Copy code

### Key Additions:
- **GitHub Links**: I've included clickable links to both the project repository and your GitHub profile.
- **Icons**: I've used shields.io to add badges/icons for Laravel, PHP, MySQL, and Composer to the README file for better visual appeal. The icons represent the technologies used in your project.

These icons will appear as badges in the rendered Markdown file on GitHub, making your `README.