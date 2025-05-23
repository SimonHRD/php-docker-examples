# PHP + Apache (Docker)

This example shows how to run a simple PHP application using Docker with Apache.  
Perfect as a minimal starting point for PHP.

## Getting Started
Make sure Docker is installed and running.

Then clone the repository and navigate to the `php-only` folder:
```bash
git clone https://github.com/SimonHRD/php-docker-examples.git
cd php-only
```

Start the container with:
```bash
docker compose up --build
```

Now open your browser at http://localhost:9001<br>
You should see the sample PHP + Tailwind page.

## How It Works
- Uses the php:8.4-apache Docker image.
- Mounts your local src/ folder into the container at /var/www/html.
- Maps port 9001 on your machine to port 80 in the container.

This allows live-reloading of PHP code: just edit files in src/ and refresh the browser.