# Lara – Full Stack Job Board Application (Laravel)

## 📌 Overview
**Lara** is a full-stack web application built with **Laravel**, designed as a classic job board system.
It covers the complete lifecycle of a real-world web application: backend logic, frontend rendering, authentication,
database persistence, and deployment on a production Linux server.

The project focuses on **clean architecture, maintainability, and practical Laravel usage**, rather than experimental
or tutorial-based code.

---

## 🚀 Live Demo
🔗 **Production URL:**  
https://jobs.marcosblasco.com.ar/

---

## 🧠 Features
- User authentication and authorization
- Job posting management (CRUD)
- Form validation using Laravel Form Requests
- Relational database with migrations and seeders
- Blade-based frontend with reusable layouts and components
- Error handling and user feedback
- Production deployment on a Linux virtual machine with **Nginx**

---

## 🛠️ Tech Stack

### Backend
- PHP 8+
- Laravel
- MySQL

### Frontend
- Blade Templates
- HTML5 / CSS3
- JavaScript

### Infrastructure & Tools
- Linux
- Nginx
- Git / GitHub
- Docker (local development)

---

## 🧱 Architecture Highlights
- MVC architecture following Laravel conventions
- Separation of concerns between controllers, requests, and models
- Database schema managed via migrations
- Environment-based configuration
- Production-ready deployment setup

---

## ⚙️ Local Setup

```bash
git clone https://github.com/marcosBlasco/Lara.git
cd Lara
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
