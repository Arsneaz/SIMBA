<h1 align="center">SIMBA (Sistem Informasi Manajemen Bayi dan Imunisasi</h1>

<p>Sistem Informasi untuk manajemen bayi di Desa Jati Mulyo, Lampug</p>

<h2>Setup App</h2>
Do this following procedure to use this application.

```xml
// Setup the app
1. Clone this repo (ZIP/http);
2. composer require update
3. npm install
4. npm run dev
5. composer require filament/forms:"3.0-stable" -W
6. Make duplicate of .env.example: run cp .env.example .env
7. Opem the MySql server [Turn on the MySql option] (Xampp) and make a database same on the DB_DATABASE .env file.
8. php artisan key:generate
9. php artisan migrate
   
// For seeding the data seeder into migration database
6. php artisan db:seed --class=WaliSeeder
7. php artisan db:seed --class=BalitaSeeder
8. php artisan db:seed --class=HistoriSeeder

// Run the application
9. php artisan serve
```


<h3>Notes</h3>

```xml
This application is far from over, I've already make a list feature that should be implemented in the notes.markdown. You can go look for that
```
