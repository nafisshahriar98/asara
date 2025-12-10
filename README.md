# ASARA – Real Estate Project Showcase

ASARA is a real estate project showcase system built with **Laravel** for the backend and **HTML, CSS, and JavaScript** for the frontend.

It allows a real estate company to manage and display their **previous, ongoing, and upcoming projects** in one place, so that clients can quickly see what the company has done and what is coming next.

---

## ✨ Features

- **Admin Login Panel**  
  Secure backend where authorized users can log in and manage content.

- **Project Management (CRUD)**  
  Admin can create, edit, update, and delete real estate projects from the dashboard.

- **Project Status & Type**  
  Each project can be marked as:
  - Completed  
  - Ongoing  
  - Upcoming

- **Detailed Project Pages**  
  Each project can include:
  - Project name  
  - Location  
  - Short description  
  - Detailed description  
  - Project type/status  
  - Start and end dates (if available)  
  - Budget / size / other custom fields (if you add them)

- **Image / Gallery Support**  
  Option to attach images to each project (e.g. building renders, site photos, floor plans).

- **Client-Facing Project Listing**  
  Public frontend where visitors can:
  - Browse all projects  
  - Filter by status (previous / ongoing / upcoming) (if implemented)  
  - View detailed information for each project

- **Responsive Frontend**  
  Custom HTML/CSS/JS layout that works across desktop and mobile (depending on your CSS setup).

---

## 🛠 Tech Stack

- **Backend:** Laravel (PHP)
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL (or any other SQL database supported by Laravel)
- **Other:** Laravel Blade templating, Eloquent ORM, REST-style routes

---

## 🚀 Getting Started

### Prerequisites

- PHP (8.x recommended)
- Composer
- MySQL (or MariaDB)
- Node.js & npm (optional, if you use any build tools)

### Installation

```bash
# Clone the repository
git clone https://github.com/nafisshahriar98/ASARA.git

cd ASARA

# Install backend dependencies
composer install

# Copy environment file
cp .env.example .env

# Configure your database credentials in .env

# Generate the application key
php artisan key:generate

# Run migrations
php artisan migrate

# (Optional) Seed sample data
# php artisan db:seed

# Start the development server
php artisan serve
