# Laravel Shop - E-commerce Application

## Overview

Built a shopping platform with CRUD product management, user authentication, cart, and order processing, using RESTful APIs and MVC architecture.

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

## API Simple Testing

The application provides RESTful APIs for managing items and products. Here are the available endpoints:

### Items API
- `GET /api/items` - Get all items
- `POST /api/items` - Create a new item
- `GET /api/items/{id}` - Get a specific item
- `PUT /api/items/{id}` - Update a specific item
- `DELETE /api/items/{id}` - Delete a specific item

### Products API
- `GET /api/product` - Get all products
- `POST /api/product` - Create a new product
- `GET /api/product/{id}` - Get a specific product
- `PUT /api/product/{id}` - Update a specific product
- `DELETE /api/product/{id}` - Delete a specific product

### Testing the APIs

You can test these APIs using tools like curl, Postman, or any HTTP client:

#### Example with curl:
```bash
# Get all items
curl -X GET http://localhost:8000/api/items

# Create a new item
curl -X POST http://localhost:8000/api/items \
  -H "Content-Type: application/json" \
  -d '{"name":"Test Item","price":29.99,"quantity":10,"description":"A test item"}'

# Get a specific item
curl -X GET http://localhost:8000/api/items/1

# Update a specific item
curl -X PUT http://localhost:8000/api/items/1 \
  -H "Content-Type: application/json" \
  -d '{"name":"Updated Item","price":39.99,"quantity":5,"description":"An updated item"}'

# Delete a specific item
curl -X DELETE http://localhost:8000/api/items/1
```

#### Example with Postman:
1. Set the request method (GET, POST, PUT, DELETE)
2. Enter the endpoint URL (e.g., http://localhost:8000/api/items)
3. For POST and PUT requests, set the Body to "raw" and choose "JSON" type
4. Add the required JSON data in the body
5. Send the request

### Required Fields

#### Items
- `name` (string, required)
- `price` (numeric, required)
- `quantity` (integer, required)
- `description` (string, optional)
- `picture` (string, optional)

#### Products
- `name` (string, required)
- `price` (numeric, required)
- `description` (string, optional)
- `image` (string, optional)
- `category_id` (integer, required)
