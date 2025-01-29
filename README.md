

# Laravel Application Setup

This guide will help you set up and run the Laravel application using Docker for the database and phpMyAdmin.

## Prerequisites

- Docker and Docker Compose installed on your machine.
- PHP and Composer installed for Laravel.

## Setting Up the Application

1. **Clone the Repository**

   Clone the repository to your local machine:

   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Install Dependencies**

   Install the PHP dependencies using Composer:

   ```bash
   composer install
   ```

3. **Environment Configuration**

   Copy the `.env.example` file to `.env` and update the necessary environment variables:

   ```bash
   cp .env.example .env
   ```

   Ensure the following database settings are configured in your `.env` file:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=laravel_user
   DB_PASSWORD=laravel_password
   ```

4. **Generate Application Key**

   Generate the application key:

   ```bash
   php artisan key:generate
   ```

## Running the Application with Docker

1. **Docker Setup**

   Ensure Docker is running on your machine.

2. **Docker Compose**

   Use Docker Compose to set up the MySQL and phpMyAdmin services. The `docker-compose.yml` file should look like this:

   ```yaml:docker-compose.yml
   startLine: 1
   endLine: 24
   ```

3. **Start Docker Services**

   Run the following command to start the services:

   ```bash
   docker-compose up -d
   ```

4. **Database Migration**

   Run the database migrations to set up the database schema:

   ```bash
   php artisan migrate
   ```

5. **Access phpMyAdmin**

   Access phpMyAdmin at [http://localhost:8080](http://localhost:8080) using the MySQL credentials from your `.env` file.

## Running the Laravel Application

1. **Serve the Application**

   Use the Artisan command to serve the application:

   ```bash
   php artisan serve
   ```

2. **Access the Application**

   Open your web browser and go to [http://localhost:8000](http://localhost:8000) to view the application.

## Additional Information

- For more details on Laravel, visit the [official documentation](https://laravel.com/docs).
- For Docker and Docker Compose, refer to the [Docker documentation](https://docs.docker.com/).
