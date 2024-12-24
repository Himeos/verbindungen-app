<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
Verbindungen is a modified version of the New York Times "Connections" game. It allows infinite attempts, and once a word is used, it disappears from the game board. The game can be localized into any language, and admin accounts can add words.

## Features
Infinite attempts, no time limit or move restrictions.
Words disappear from the game board after being selected.
Admin accounts can add words and manage content.
## Tech Stack
- **Backend:** Laravel 11.34.2
- **Frontend:** Blade templates (no JS framework used)
- **Styling:** Tailwind CSS and plain CSS
- **Database:** MySQL
- **Additional Features:** JavaScript for interactivity
## About Laravel
Laravel is a web application framework with expressive, elegant syntax. It simplifies common tasks used in many web projects, such as:

Simple, fast routing engine.
Powerful dependency injection container.
Multiple back-ends for session and cache storage.
Expressive, intuitive database ORM.
Database agnostic schema migrations.
Robust background job processing.
Real-time event broadcasting.
Laravel provides tools for building large, robust applications.

## Installation

### Prerequisites
Make sure you have the following installed:
- PHP >= 8.0
- Composer
- Node.js (for front-end dependencies)
- MySQL (or your preferred database)
## Steps to Set Up
Clone this repository to your local machine:

```bash
git clone https://github.com/yourusername/verbindungen.git
cd verbindungen
```
## Install PHP dependencies:


```bash
composer install
```

## Set up your environment file:

```bash
cp .env.example .env
```

## Generate the application key:
```bash
php artisan key:generate
```

Update the .env file with your database credentials.

## Import the database schema from the provided SQL file:

In your MySQL database, import the verbindungen_database.sql file. You can do this using a tool like phpMyAdmin or the command line:

```bash
mysql -u username -p database_name < verbindungen_database.sql
```

## Run database migrations:

```bash
php artisan migrate
```


## Install front-end dependencies
```bash
npm run dev
```
## Serve the application:

```bash
php artisan serve
```
Now you can access the game by navigating to http://127.0.0.1:8000 in your browser.

## Usage
- **Start a New Game:** Click "Start" to begin a new game.
- **Gameplay:** Select four words that share a category. Repeat until all words are used up. Words disappear once they are selected.

## Demo

<video width="600" controls>
  <source src="media/demo.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>



