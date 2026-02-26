# Laravel 12 Project Deployment Guide

This repository contains a web application built with **Laravel 12**. Follow the instructions below to set up the project locally using **Laravel Sail**.
<br>

## 🛠 Prerequisites

Ensure you have the following installed on your local machine:
* **Docker Desktop** (Required for Laravel Sail)
* **PHP 8.3** (Optional, for running composer locally if needed)
* **Composer**
<br>

## 🚀 Installation Steps

__1. Clone & Navigate__

Open your terminal and navigate to the project directory:

```
cd path/to/your-project
```
<br>

__2. Install Dependencies__

Install PHP dependencies ignoring platform requirements (since Sail will handle the environment later):

```
composer install --ignore-platform-reqs
```
<br>

__3. Environment Configuration__

Create your local environment file:

```
cp .env.example .env
```
**Note:** Open .env and ensure the database credentials match your Sail setup.
<br>

__4. Install & Configure Laravel Sail__

Install Sail into your project:

```
php artisan sail:install
```

Select **MySQL** when prompted.

Add the following environment variables to your .env file to ensure correct versions and media handling:

```
SAIL_PHP_VERSION=8.3
MEDIA_DISK=media
```
<br>

__5. Start the Environment__

Launch the Docker containers:

```
./vendor/bin/sail up
```
_(Use the -d flag to run in the background)_
<br>

__6. Finalize Setup__

Generate the application key and create the storage symbolic link:

```
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan storage:link
```
Restart Sail to apply all configuration changes:

```
./vendor/bin/sail down
./vendor/bin/sail up
```
<br>

__7. Database & Frontend__

Update dependencies and run migrations:

```
./vendor/bin/sail artisan migrate
```
Install and compile frontend assets:

```
./vendor/bin/sail npm install
./vendor/bin/sail npm run build
```
<br>

__8. Media & Database Preparation__

Before running the containers, ensure you have manually added the following to your project:

* **Database**: Import your SQL dump from the hosting to your local environment (after containers are up).
* **Media**: Place the downloaded media folder from the hosting into public/media.
<br>

## 💡 Useful Tips

Setting Up an Alias

To avoid typing ./vendor/bin/sail every time, add an alias to your shell configuration:

```
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

Now you can simply use `sail artisan migrate`.
<br>

__Local Access Points__

* **Web App:** http://localhost
* **PhpMyAdmin:** http://localhost:8080
<br>

__Development Mode__

To start a development server with Vite (hot-reloading):

```
./vendor/bin/sail npm run dev
```
<br>

## 📋 Recommended Command Summary

| Task            | Command               |
| -------------   |-----------------------|
| Start project   | `sail up -d`          |
| Stop project    | `sail down`           |
| Run migrations  | `sail artisan migrate`|
| Compile assets  | `sail npm run build`  |