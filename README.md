# StayFinder — Airbnb-Inspired Property Rental Platform

StayFinder is a full-stack property rental and booking platform inspired by Airbnb. It enables users to discover accommodations, explore property details, manage bookings, and save their favourite listings. Hosts can manage their properties, while administrators have access to platform management features.

Developed as part of an internship project.

## Features

### Authentication & User Management

- User registration and login using Clerk
- User profile management
- Role-based admin interface
- User session management

### Property Discovery

- Browse property listings
- Search properties by location
- Filter listings using available criteria
- View detailed property information
- Property image galleries

### Booking Management

- Select check-in and check-out dates
- View booking summaries
- Manage reservations
- Access booking history

### Wishlist

- Save favourite properties
- View saved properties
- Remove properties from the wishlist

### Host Dashboard

- Create and manage property listings
- Edit property information
- Upload property images
- View booking requests

### Admin Dashboard

- Manage users and properties
- Review and moderate listings
- Manage reservations and categories
- View platform analytics
- Manage notifications

## Technology Stack

| Layer                   | Technologies              |
| ----------------------- | ------------------------- |
| Frontend                | React 19, JavaScript      |
| Styling                 | Tailwind CSS 4, CSS       |
| Build Tool              | Vite                      |
| Routing                 | React Router              |
| Authentication          | Clerk                     |
| Backend                 | PHP 8.2+, Laravel 12      |
| Database                | MySQL configuration       |
| API Communication       | REST APIs, Axios          |
| Image Management        | Cloudinary                |
| Real-time Communication | Laravel Reverb, Pusher    |
| Maps                    | Leaflet, React Leaflet    |
| Data Visualization      | Recharts                  |
| Icons                   | Lucide React, React Icons |

## Project Structure

```text
Airbnb-Clone/
│
├── frontend/
│   ├── public/
│   ├── src/
│   │   ├── api/
│   │   ├── assets/
│   │   ├── components/
│   │   ├── config/
│   │   ├── context/
│   │   ├── hooks/
│   │   ├── pages/
│   │   ├── App.jsx
│   │   └── main.jsx
│   ├── package.json
│   └── vite.config.js
│
├── backend/
│   ├── app/
│   │   ├── Http/
│   │   ├── Models/
│   │   └── Services/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   ├── composer.json
│   └── .env.example
│
├── .gitignore
├── README.md
└── CHANGES.txt
```

## Getting Started

### Prerequisites

Install the following before running the project:

- Node.js and npm
- PHP 8.2 or later
- Composer
- MySQL
- A Clerk account and application
- Cloudinary credentials for image upload functionality

### 1. Clone the repository

```bash
git clone https://github.com/rishavlal/Airbnb-Clone.git
cd Airbnb-Clone
```

### 2. Backend Setup

```bash
cd backend
composer install
```

Create your environment file:

```powershell
Copy-Item .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

Configure your database and required service credentials in `backend/.env`.

Run database migrations:

```bash
php artisan migrate
```

Start the Laravel development server:

```bash
php artisan serve
```

### 3. Frontend Setup

Open another terminal:

```bash
cd frontend
npm install
```

Create a frontend `.env` file and configure the required variables:

```env
VITE_CLERK_PUBLISHABLE_KEY=your_clerk_publishable_key
VITE_API_BASE=http://127.0.0.1:8000
```

Start the frontend:

```bash
npm run dev
```

Open the local URL displayed by Vite in your browser.

## Environment Configuration

Keep all actual credentials private. Never commit `.env` files, Clerk secret keys, Cloudinary API secrets, database passwords, or other private credentials.

Use `.env.example` files to document the required configuration variables.

## My Internship Contributions

My individual frontend contributions included:

- Designed and implemented the Home page using React and CSS.
- Designed and implemented the Experiences page using React and CSS.
- Contributed to the frontend development of the Services page.

The remaining application features were developed as part of the wider project.

## Learning Outcomes

- React-based frontend development
- Component-based UI architecture
- REST API integration
- Laravel backend fundamentals
- Clerk authentication integration
- Database-driven application development
- Git and GitHub collaboration
- Full-stack application structure

## Project Status

Under development and undergoing improvements for documentation, maintainability, and deployment readiness.

## Acknowledgements

Developed as part of an internship project in collaboration with the project team. Credit to the original project contributors.
