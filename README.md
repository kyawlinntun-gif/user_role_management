User role management
Languages Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Requirements
Ensure you have the following installed:
PHP >= 8
MySQL (or any other supported database)

Installation Steps
1. Clone the repository
Clone the project from GitHub:
git clone https://github.com/kyawlinntun-gif/user_role_management.git

<!-- 2. Create a database
Create a new database in MySQL (or your preferred database server).
Update the .env file in the project root to include your database connection settings:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

3. Migrate the database
Run the migration command to set up the required database tables:
php artisan migrate -->

4. Serve the application
Start the development server:
php -S localhost:90 -t public
The application will be accessible at http://localhost:90.