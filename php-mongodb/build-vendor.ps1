# Set image and build target
$imageName = "php-mongodb-dev"
$buildTarget = "dev"

Write-Host "Building Docker image with target: $buildTarget..."
docker build --target=$buildTarget -t $imageName .

Write-Host "Creating temporary container from image..."
$containerID = docker create $imageName

Write-Host "Cleaning up any existing src/vendor/..."
if (Test-Path "./src/vendor") {
    Remove-Item -Recurse -Force "./src/vendor"
}

Write-Host "Copying vendor/ from container to ./src/vendor..."
docker cp ${containerID}:/var/www/html/vendor ./src/vendor

Write-Host "Cleaning up temporary container..."
docker rm $containerID

Write-Host "Done! You can now run: docker compose -f compose.dev.yaml up"