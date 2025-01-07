# Inventory Management System
The Inventory Management System is a web-based application built using Laravel and Filament v3. This system helps manage stock data with CRUD (Create, Read, Update, Delete) operations. It is accessible only to Admin users to ensure data security.

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

## Features
- CRUD Operations for managing items, incoming goods, and outgoing goods.
- Admin-Only Authentication to secure access to the system.
- Dashboard displaying key inventory statistics.
- Data Management with search, sorting, and filtering functionality.

## Installation
Follow these steps to set up the project locally :

# Prerequisites
- PHP >= 8.1
- Composer
- Laravel >= 10
- Node.js & npm

# Installation Steps
## 1. Clone the Repository
```
git clone https://github.com/rhmats/Inventory-filament.git
cd Inventory-filament
```
## 2. Install Dependencies
```
composer install
npm install
```
## 3. Copy and configure the environment file:
```
cp .env.example .env
```
## 4. Generate the application key:
```
php artisan key:generate
```
## 4. Run the database migrations:
```
php artisan migrate
```
## 5. Start the local development server:
```
php artisan serve
```

# Usage
## 1. Access the Admin Panel
The system uses Filament for the admin interface. To access the admin panel, open your browser and go to :
```
http://localhost:8000/admin
```

## 2. Admin Login Information
Use the following credentials to log in as an Admin:
- Email: admin@gmail.com
- Password: password

It is recommended to change the admin password after installation for security purposes

# Built With
- Laravel - A PHP web framework
- Filament v3 - An admin panel builder for Laravel

## Contributing
Contributions are welcome! Feel free to submit a pull request or create an issue if you find a bug or have a feature request.

## License
This project is open-source and available under the MIT License.

## 📞 Contact
If you have any questions, feel free to reach out via https://www.linkedin.com/in/rahmat-syafriyani/ or rahmatsyafriyani809@gmail.com
Let's Connect!
