## Setup

### Api Slim
```bash
# navigate to app folder
cd api
```

```bash
# install dependencies
composer install
```

```bash
# create .env file
cp .env.example .env
```
Set environment variables for database.

```bash
# run the server on localhost:8000 (the same VUE_APP_API_URL)
php -S localhost:8000 -t public/
```

### SPA Vuejs

```bash
# navigate to app folder
cd app
```

```bash
# install dependencies
yarn
```

```bash
# create .env file
cp .env.example .env
```
Use the default `VUE_APP_API_URL` or set up your own environment.
Remember to run the API server on the correct port.

```bash
# run app
yarn serve
```

### Database Mysql
Navigate to `db` folder and create a database using the `dump.sql`