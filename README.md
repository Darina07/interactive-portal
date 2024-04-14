# Employer Request Landing page

Brief description of the project.

## Installation

Follow these steps to get the project up and running on your local machine.

### Prerequisites

- PHP >= 7.3
- Composer
- Node.js and NPM (optional, only if using frontend assets)
- MySQL or any other supported database

### Installation commands

composer install

php artisan key:generate

php artisan migrate --seed

npm install && npm run dev


### Additional Configuration (if needed)
Configure mail settings in the .env file if your application sends emails.


### Mail
Mail view files is resources/views/mail/request.blade.php
