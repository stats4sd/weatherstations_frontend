
cd /var/www/weatherstations_frontend
git stash
git pull
php artisan migrate
composer install
npm install
npm run dev
pip3 install -r requirements.txt