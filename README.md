# Running Project

### Running Docker

```
docker compose up -d
```

### Duplicate .ENV.EXAMPLE

Duplique o arquivo .env.example renomeando para .env

### Install Dependencies

```
docker run --rm --interactive --tty \
  --volume $PWD:/app \
  composer install
```

### Generate Key

```
docker compose exec api_app php artisan key:generate
```

### Rodando Migrations

```
docker compose exec api_app php artisan migrate
```

## PHPMyAdmin
http://localhost:8001