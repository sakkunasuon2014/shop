# Laravel Shop - E-commerce Application

## Overview

Laravel Shop is a full-featured e-commerce web application built with the Laravel PHP framework. This application provides a complete online shopping experience with product management, user authentication, shopping cart functionality, and order processing.

## Project Structure

The application follows Laravel's MVC (Model-View-Controller) architecture:

### Models
- `Product`: Represents products with name, price, description, and image
- `Category`: Product categories for organization
- `Order`: Customer orders with status tracking
- `OrderItem`: Individual items within an order
- `User`: Registered users with authentication
- `Profile`: User profile information

### Controllers
- `ProductController`: Manages CRUD operations for products
- `CategoryController`: Handles category management
- `OrderController`: Processes and manages orders
- `StoreController`: Handles frontend shopping cart functionality
- `FrontendController`: Manages public-facing product listings
- `AuthController`: User authentication (login/registration)
- `UserController`: User profile management

## Installation

1. Clone the repository
2. Run `composer install` to install PHP dependencies
3. Run `npm install` to install frontend dependencies
4. Copy `.env.example` to `.env` and configure your database settings
5. Run `php artisan key:generate` to generate application key
6. Run `php artisan migrate` to create database tables
7. Run `php artisan serve` to start the development server

## Routes

The application includes both public-facing routes for customers and protected admin routes:

- `/` - Homepage with featured products
- `/list` - Full product listing
- `/product/{id}` - Individual product details
- `/cart` - Shopping cart
- `/checkout` - Order processing
- `/login` - User login
- `/register` - User registration
- `/dashboard` - Admin dashboard
- `/orders` - Order management

## Technologies Used

- **Laravel 12+**: PHP web application framework
- **PHP 8+**: Server-side scripting language
- **MySQL**: Database management system
- **Bootstrap 5**: Frontend CSS framework
- **Blade**: Laravel's templating engine
- **Composer**: PHP dependency management