<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Instagram Clone

A full-stack Laravel-based Instagram clone featuring user authentication, profile management, posts with image uploads, likes, and comments. This project demonstrates modern Laravel development practices, including Eloquent ORM, Blade templating, RESTful controllers, and integration with MongoDB and SQLite.

## Features

- User registration, login, and authentication
- Profile editing (name, username, bio, profile image)
- Create, edit, and delete posts with image uploads
- Like/unlike posts
- Comment on posts
- Responsive UI with Bootstrap and FontAwesome
- Feed page showing posts from all users
- User profile pages with posts gallery
- RESTful API structure using Laravel controllers
- MongoDB and SQLite support

## Folder Structure

- `app/` - Application logic (controllers, models, providers)
- `bootstrap/` - Laravel bootstrap files
- `config/` - Configuration files (database, cache, mail, etc.)
- `database/` - Migrations, seeders, factories, SQLite DB
- `public/` - Public assets and entry point
- `resources/` - Views (Blade), CSS, JS, SASS
- `routes/` - Route definitions (`web.php`, `console.php`)
- `storage/` - File uploads, logs, cache
- `tests/` - Test files
- `vendor/` - Composer dependencies

## Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js & npm
- MongoDB (optional, for MongoDB connection)
- SQLite (default)

### Installation

1. **Clone the repository**
   ```sh
   git clone <repo-url>
   cd instaCamp
   ```

2. **Install PHP dependencies**
   ```sh
   composer install
   ```

3. **Install JS dependencies**
   ```sh
   npm install
   ```

4. **Copy environment file**
   ```sh
   cp .env.example .env
   ```

5. **Set up environment variables**
   - Edit `.env` for DB settings (`DB_CONNECTION`, `DB_DATABASE`, `DB_URI` for MongoDB, etc.)
   - Set up mail, cache, and other settings as needed.

6. **Generate application key**
   ```sh
   php artisan key:generate
   ```

7. **Run migrations**
   ```sh
   php artisan migrate
   ```

8. **(Optional) Seed the database**
   ```sh
   php artisan db:seed
   ```

9. **Build frontend assets**
   ```sh
   npm run build
   ```

10. **Start the development server**
    ```sh
    php artisan serve
    ```

## Usage

- Register a new user or log in.
- Edit your profile and upload a profile image.
- Create new posts with images.
- Like and comment on posts.
- View other users' profiles and posts.

## Configuration

- Database connections are managed in [`config/database.php`](config/database.php).
- Default is SQLite; MongoDB is supported via the `mongodb` connection.
- Frontend assets are managed with Vite ([`vite.config.js`](vite.config.js)).
- Views are in [`resources/views/`](resources/views/).

## Testing

Run tests with:

```sh
php artisan test
```

or

```sh
vendor/bin/phpunit
```

## Contributing

Pull requests are welcome! Please follow PSR standards and write tests for new features.

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).

## Credits

Built with [Laravel](https://laravel.com/), [Bootstrap](https://getbootstrap.com/), and [FontAwesome](https://fontawesome.com/).
