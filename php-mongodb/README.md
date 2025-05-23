# PHP + MongoDB + Mongo Express (Docker)

This example shows how to run a PHP application connected to a MongoDB database using Docker Compose.  
It supports both **development** (live code reloading) and **production** (clean image) setups, and includes a Mongo Express web UI for managing the data.


## Getting Started
Make sure Docker is installed and running.

Then clone the repository and navigate to the `php-mongodb` folder:
```bash
git clone https://github.com/SimonHRD/php-docker-examples.git
cd php-mongodb
```

### Setup for Development
This setup is optimized for development mode.

The container mounts your local `src/` folder into `/var/www/html/`, so any code changes you make are reflected instantly - no rebuilds required.<br>
However, because the volume mount overwrites everything inside the container, including dependencies, you must first generate the `vendor/` folder locally

**1. Build the `vendor/` folder locally using the helper script:**
```bash
./build-vendor.ps1
```

This extracts the Composer dependencies from a Docker image into your local src/vendor/ folder, which is required because the container mounts src/ and overwrites its own contents.

**2. Start the development container:**
```bash
docker compose -f compose.dev.yaml up --build
```

**3. Open in the browser:**
- App: http://localhost:8080
- Mongo Express: http://localhost:8081

### Setup for Production
This setup is optimized for production.

The container does not mount the local code, but instead uses the source and dependencies that are copied into the image during build time.<br>
This ensures a clean, reproducible environment with no local dependencies required.

To test the clean production image (no mounted volumes):
```bash
docker compose -f compose.prod.yaml up --build
```
Then open in the browser:
- App: http://localhost:8080
- Mongo Express: http://localhost:8081


## How It Works
- Multi-stage Dockerfile builds:
    - Stage 1: Installs Composer dependencies
    - Stage 2: Development image with mounted volumes and live reload
    - Stage 3: Production image with static code baked in
- Uses the official mongo image for the database
- Seeds the database with mongo-init/init.js
- Provides Mongo Express UI to manage MongoDB in the browser
- DB credentials are stored in .env