#!/bin/bash

cd /var/www/staging-weatherstations_frontend
git stash
git pull
php artisan migrate
composer install
npm install
npm run dev
# python3 -m pip install -r requirements.txt


