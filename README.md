Browser-Based CRUD Basic Login System

A lightweight site that implements CRUD (Create, Read, Update, Delete) functionality. 

🚀 Overview
This project is a foundational web application designed to demonstrate how a frontend browser interface interacts with a backend PHP server and a MySQL database. It allows users to register, log in, view their data, update profile information, and delete their accounts.

🛠 Tech Stack
-Frontend: HTML, CSS, JavaScript (Browser-based)
-Backend: PHP
-Database: MySQL (Managed via phpMyAdmin)
-Development Environment: XAMPP
-Editor: Visual Studio Code

📋 Features
-User Registration:** Create a new account (Create).
-Secure Login:** Authenticate users against database records (Read).
-Profile Management:** Update user details (Update).
-Account Deletion:** Remove user data from the system (Delete).
-Session Handling:** Securely keep users logged in across pages.

⚙️ Installation & Setup (XAMPP)

To run this project locally, follow these steps:

1.  Clone the Repository:
    ```bash
    git clone [https://github.com/your-username/your-repo-name.git](https://github.com/your-username/your-repo-name.git)
    ```

2.  Move to XAMPP Directory:
    Place the project folder inside your XAMPP installation directory:
    `C:/xampp/htdocs/CRUDbasicLogin`

3.  Start Services:
    Open the **XAMPP Control Panel** and start:
    * Apache
    * MySQL

4.  Database Setup:
    * Open your browser and go to `http://localhost/phpmyadmin`.
    * Create a new database (e.g., `logindb`).
    * Import the `logindb.sql` file provided in this repository (or run the SQL queries manually).

5.  Configuration:
    * Open the project in **Visual Studio Code**.
    * Ensure your `phpseparate.php (usually named config.php` or `db_connect.php)` file matches your local MySQL credentials (usually `root` with no password).

6.  Run the App:
    Go to `http://localhost/crudbasiclogin/index.php` in any web browser.
