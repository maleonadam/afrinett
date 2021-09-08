## Installation

# clone the repo
$ git clone origin https://github.com/maleonadam/afrinett.git

# go into app's directory
$ cd afrinett

# install app's dependencies
$ composer install

# install app's dependencies
$ npm install

# Create a DB
* I have created one called "afrinett"

# I have used MySQL so

Copy file ".env.example", and change its name to ".env".
Then in file ".env" complete this database configuration:
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=afrinett
* DB_USERNAME=root
* DB_PASSWORD=

# Configure Email server(Mailtrap)
* Create an account with mailtrap.io
* Get you credentials (username & password)

# Edit the .env file like this
* MAIL_MAILER=smtp
* MAIL_HOST=smtp.mailtrap.io
* MAIL_PORT=2525
* MAIL_USERNAME=yourusername
* MAIL_PASSWORD=yourpassword
* MAIL_ENCRYPTION=tls
* MAIL_FROM_ADDRESS=afrinett@example.com
* MAIL_FROM_NAME="${APP_NAME}"

# generate laravel APP_KEY
$ php artisan key:generate

# run database migration and seed
$ php artisan migrate:refresh --seed

# generate mixing
$ npm run dev

# and repeat generate mixing
$ npm run dev

# start local server
$ php artisan serve
* Application will open at: localhost:8000

# login to the application
* E-mail: admin@admin.com
* Password: password

# Finally explore the Dashboard

