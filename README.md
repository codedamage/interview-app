## Deployment

This project uses Docker and sail for local deployment, so make sure you're installed Docker before trying to deploy

- wsl
- bash ./vendor/laravel/sail/bin/sail up
- docker ps
- docker exec -it <container_id> /bin/bash
- php artisan migrate

## Requirements

- wsl(or linux-based machine)
- Docker
- PHP 8.1 or higher
- Composer
