

<h1 align="center">
Recyclining platform
</h1>



## Feature System




How to setup locally

-  Clone the repository
```bash
git clone https://github.com/developeralamin/recyclinig_platform
```

- Install dependencies
```bash
composer install
```

- Create a copy of your .env file
```
cp .env.example .env
```
- For setup local mailtrap .env file
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=######
MAIL_PASSWORD=######
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```


- Generate an app encryption key
```bash
php artisan key:generate
```

- Create Database Name .env file
```
DB_DATABASE = 
```
- Run migrations
```bash
php artisan migrate
```




- Run the local development server
```bash
php artisan serve
```

- Visit http://localhost:8000 in your browser
- Create account
- Login with email and password
