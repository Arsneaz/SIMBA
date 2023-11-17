<h1 align="center">SIMBA (Sistem Informasi Manajemen Bayi dan Imunisasi</h1>

<p>Sistem Informasi untuk manajemen bayi di Desa Jati Mulyo, Lampung</p>

<h2>Setup App</h2>
Do this following procedure to use this application.

Prerequisite following apps to run:
1. Composer
2. Laravel 8.0 (Xampp)

How to setup the App
```xml
// Install the App
1. Clone this repo (ZIP/http);
2. composer install
3. npm install
5. composer require filament/forms:"3.0-stable" -W
6. Make duplicate of .env.example: run cp .env.example .env
7. Open the MySQL server [Xampp], and makes a new database same on the DB_DATABASE in .env files.

// Generating the migrate tables.
8. php artisan key:generate
9. php artisan migrate
   
// For seeding the data seeder into migration database
10. php artisan db:seed --class=WaliSeeder
11. php artisan db:seed --class=BalitaSeeder
12. php artisan db:seed --class=HistoriSeeder

// Run the application
13. php artisan serve
```

<h3>Notes</h3>

```xml
This application is far from over, I've already make a list feature that should be implemented in the notes.markdown. You can go look for that
```
