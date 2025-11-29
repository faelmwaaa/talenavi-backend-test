# Technical Test Backend - Talenavi

## Candidate Information
- **Name:** Rafael Bagus Pratama Hartanto
- **Role:** Backend Developer Internship
- **Tech Stack:** Laravel 10, MySQL, Postman

## Project Overview
This project is a REST API for managing a Todo List with advanced filtering and Excel reporting capabilities.

### Features
1. **Create Todo:** API to store todo items with validation.
2. **Export to Excel:** Generate detailed reports with a Summary Row.
3. **Advanced Filtering:** Filter by Title, Assignee, Priority, Status, Date Range, and Time Tracked.

## How to Run

### 1. Clone the Repository
```bash
git clone [YOUR REPO LINK HERE]
cd talenavi-backend
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
Copy `.env.example` to `.env` and configure your database:

```env
DB_DATABASE=Talenavi
DB_USERNAME=root
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Start Server
```bash
php artisan serve
```

## API Documentation

A Postman Collection is included in the submission email to test the endpoints.

### Endpoints
- **POST** `/api/todos` - Create a new Todo
- **GET** `/api/todos/export` - Download Excel report

## Deployment

To push changes to GitHub:

```bash
git add README.md
git commit -m "Update README with run instructions"
git push
```
