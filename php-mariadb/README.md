# PHP + MariaDB + phpMyAdmin (Docker)

This example shows how to run a PHP application with a MariaDB database and phpMyAdmin using Docker Compose.

It's a great setup for full-stack PHP projects with a database backend and GUI-based DB management.

## Getting Started
Make sure Docker is installed and running.

Then clone the repository and navigate to the `php-mariadb` folder:
```bash
git clone https://github.com/SimonHRD/php-docker-examples.git
cd php-mariadb
```

Start the container with:
```bash
docker compose up --build
```

Then open:
- Your PHP app: http://localhost:9001
- phpMyAdmin UI: http://localhost:6080


## How It Works
- Uses the official php:8.4-apache image with required extensions (pdo, pdo_mysql, mysqli) via Dockerfile
- Connects to a mariadb container defined in compose.yaml
- Initializes the database using db-init.sql
- GUI management via phpMyAdmin
- DB credentials and settings are defined in the .env file