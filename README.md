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

```txt
database/schema.sql
database/seed.sql
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

## Security Features

- Password hashing
- CSRF protection
- Prepared SQL statements
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
