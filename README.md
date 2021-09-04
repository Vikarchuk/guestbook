# Simple guestbook application
## Installation
Migrate and seed
```bash
php artisan migrate --seed
```
Create admin user
```bash
php artisan create:admin
```
Install the frontend scaffolding using the ui Artisan command
```bash
php artisan ui bootstrap --auth
```
Export customize pagination
```bash
php artisan vendor:publish --tag=laravel-pagination
npm install && npm run dev
```
