# Task Management Application

A simple task management application built using core PHP with MVC architecture.

## Features

- User authentication
- User registration
- Task CRUD operations
- Task filtering by status
- CSRF protection
- Flash messaging
- Responsive Bootstrap UI
- Session-based authentication

---

## Tech Stack

- PHP 8+
- MySQL
- PDO
- Bootstrap 5
- Composer PSR-4 Autoloading

---

## Project Structure

This project follows a lightweight MVC architecture:

- Controllers handle requests
- Models handle database interaction
- Views render UI
- Core contains reusable framework-like components

---

## Installation

### 1. Clone repository

```bash
git clone https://github.com/varadsant/task-management-app.git
```

---

### 2. Install dependencies

```bash
composer install
```

---

### 3. Create environment file

```bash
cp .env.example .env
```

Update database credentials inside `.env`.

---

### 4. Create database

Create a MySQL database named:

```txt
task_management
```

---

### 5. Import SQL

Import the SQL schema from:

```bash
mysql -u root -p
```

```txt
use task_management;

source database/schema.sql;
source database/seed.sql;
```

---

### 6. Run application

```bash
php -S localhost:8000 -t public
```

Visit:

```txt
http://localhost:8000
```

---

## Demo Credentials

### Demo User

Email:

```txt
user@test.com
```

Password:

```txt
password123
```

---

## Composer Usage

This project does not use a full PHP framework such as Laravel or CodeIgniter.

Composer was used only for:

- PSR-4 autoloading
- dependency management
- loading environment variables using `vlucas/phpdotenv`
  

## Architecture Overview

This project follows a lightweight MVC architecture built in core PHP:

- **Controllers** handle HTTP requests and application flow
- **Models** handle database interactions using PDO
- **Views** handle presentation logic with reusable layouts
- **Core components** provide shared functionality (Auth, Database, Router, CSRF, Session)

## Core Components

The `Core` layer contains the essential building blocks of the application, designed to keep the system modular and reusable.

- **Router** – Handles request routing and maps URLs to controller actions  
- **Database** – Manages PDO connection and database interactions  
- **View** – Handles rendering of views with layout support  
- **Auth** – Manages authentication, session checks, and user identity  
- **Session** – Provides flash messaging and session utilities  
- **CSRF** – Handles token generation and request validation for security  

These components act as a lightweight framework foundation, enabling separation of concerns and maintaining clean application structure without relying on a full PHP framework.

## Security Features

- Password hashing using `password_hash()`
- CSRF protection
- Prepared statements (PDO) to prevent SQL injection
- Session authentication
- XSS prevention using `htmlspecialchars`

---

## Notes

This project was intentionally built without using a full PHP framework in order to demonstrate understanding of:

- routing
- MVC architecture
- authentication
- session handling
- security concepts
- reusable application structure
