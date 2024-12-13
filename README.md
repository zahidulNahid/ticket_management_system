# Ticket Management System

## Description
A Ticket Management System built with Laravel that allows administrators to manage buses and tickets while enabling users to view and purchase tickets.

---

## Features
- **User Authentication**: User registration, login, and logout.
- **Role-based Access**:
  - **Admin**: Manage buses and tickets (add, update, delete).
  - **User**: View available buses and tickets, purchase tickets.
- **Database Models**:
  - Users
  - Buses
  - Tickets
  - Purchased Tickets
- **RESTful API Endpoints** for seamless integration.

---

## Technologies Used
- **Framework**: Laravel
- **Database**: MySQL
- **Authentication**: Laravel Sanctum
- **Version Control**: Git

---

## Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Git
- Postman (for testing APIs)

---

## Installation Guide

### 1. Clone the Repository:
```bash
git clone https://github.com/zahidulNahid/ticket_management_system.git
cd ticket_management_system
```

### 2. Install Dependencies:
```bash
composer install
```

### 3. Configure Environment:
- Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```
- Set up database credentials in the `.env` file.

### 4. Generate Application Key:
```bash
php artisan key:generate
```

### 5. Run Migrations:
```bash
php artisan migrate
```

### 6. Start Development Server:
```bash
php artisan serve
```
Access the application at [http://127.0.0.1:8000].

---

## API Endpoints

### Authentication
- **Register**: `POST /api/auth/register`
- **Login**: `POST /api/auth/login`
- **Logout**: `POST /api/auth/logout`

### Admin Routes
- **Add Bus**: `POST /api/admin/bus`
- **Update Bus**: `PUT /api/admin/bus/{id}`
- **Delete Bus**: `DELETE /api/admin/bus/{id}`
- **Add Ticket**: `POST /api/admin/ticket`
- **Update Ticket**: `PUT /api/admin/ticket/{id}`
- **Delete Ticket**: `DELETE /api/admin/ticket/{id}`

### User Routes
- **View Buses**: `GET /api/buses`
- **View Tickets**: `GET /api/tickets`
- **Purchase Ticket**: `POST /api/tickets/purchase`

---

## Postman API Documentation
Postman collection link : https://ticket-management-system-5713.postman.co/workspace/Ticket-Management-System-Worksp~d6f2bf25-ef11-493a-a3c7-30d564d123ff/collection/40369017-52341e8c-937a-40ff-a9bf-52515001e9e2?action=share&creator=40369017

---

## License
This project is licensed under the [MIT License](LICENSE).

---

## Contact
For anything necessary, please contact Zahidulnahid7464@gmail.com.
