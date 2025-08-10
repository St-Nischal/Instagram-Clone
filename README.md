<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
Instagram Clone

A full-stack Laravel-based Instagram clone featuring user authentication, profile management, posts with image uploads, likes, and comments. This project demonstrates modern Laravel development practices, including Eloquent ORM, Blade templating, RESTful controllers, and integration with MongoDB and SQLite.
Features

    User registration, login, and authentication

    Profile editing (name, username, bio, profile image)

    Create, edit, and delete posts with image uploads

    Like/unlike posts

    Comment on posts

    Responsive UI with Bootstrap and FontAwesome

    Feed page showing posts from all users

    User profile pages with posts gallery

    RESTful API structure using Laravel controllers

    MongoDB and SQLite support

Cloud Storage & Database Integration

    Amazon S3 is fully integrated for storing all images (profile pictures and post uploads), providing scalable, reliable, and secure cloud storage.

    MongoDB Atlas is used as the primary database for storing all application data including users, posts, comments, and likes, offering flexible schema design and high performance in the cloud.

    This combination allows your app to efficiently manage media assets and data in a modern cloud-native architecture.

Folder Structure

    app/ - Application logic (controllers, models, providers)

    bootstrap/ - Laravel bootstrap files

    config/ - Configuration files (database, cache, mail, etc.)

    database/ - Migrations, seeders, factories, SQLite DB

    public/ - Public assets and entry point

    resources/ - Views (Blade), CSS, JS, SASS

    routes/ - Route definitions (web.php, console.php)

    storage/ - File uploads, logs, cache

    tests/ - Test files

    vendor/ - Composer dependencies

Getting Started
Prerequisites

    PHP >= 8.1

    Composer

    Node.js & npm

    MongoDB (optional, for MongoDB connection)

    SQLite (default)

Installation

    Clone the repository

git clone <repo-url>
cd instaCamp

Install PHP dependencies

composer install

Install JS dependencies

npm install

Copy environment file

cp .env.example .env

Set up environment variables

    Edit .env for DB settings (DB_CONNECTION, DB_DATABASE, DB_URI for MongoDB, etc.)

    Configure AWS S3 credentials and bucket settings

    Set up mail, cache, and other settings as needed.

Generate application key

php artisan key:generate

Run migrations

php artisan migrate

(Optional) Seed the database

php artisan db:seed

Build frontend assets

npm run build

Start the development server

    php artisan serve

Usage

    Register a new user or log in.

    Edit your profile and upload a profile image.

    Create new posts with images.

    Like and comment on posts.

    View other users' profiles and posts.

Configuration

    Database connections are managed in config/database.php.

    Default is SQLite; MongoDB is supported via the mongodb connection.

    AWS S3 is configured via the filesystem in config/filesystems.php and environment variables (AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, AWS_DEFAULT_REGION, AWS_BUCKET).

    Frontend assets are managed with Vite (vite.config.js).

    Views are in resources/views/.

Testing

Run tests with:

php artisan test

or

vendor/bin/phpunit

Contributing

Pull requests are welcome! Please follow PSR standards and write tests for new features.
License

This project is open-sourced under the MIT license.
Credits

Built with Laravel, Bootstrap, and FontAwesome.
