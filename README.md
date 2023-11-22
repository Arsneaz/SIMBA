# SIMBA - (Sistem Informasi Manajemen Bayi dan Imunisasi) 

SIMBA adlalah sebuah sistem informasi berbasis CMS (_Content Management System_) sebagai optimalisasi kegiatan pencatatan data imunisasi bayi di Desa Jatimulto, Jati Agung, Lampung.

<p align="center">
  <img src="https://github.com/Arsneaz/SIMBA/assets/96061442/f0bc860b-57c5-457a-8daf-6b7842fea8d9">
</p>
<p align="center">
  <img src="https://github.com/Arsneaz/SIMBA/assets/96061442/fddd01fc-ee79-49ec-a3a4-d502ab5e698d">
</p>

## Features
- **Dashboard**: Gambaran jelas tentang metrik imunisasi di Desa Jatimulyo.
- **Data Management**: Alat untuk mencatat catatan tentang imuniasi bayi secara efisien.
- **User-Friendly Interface**: Navigasi yang mudah digunakan terhadap kunci kunci penting seperti data balita dan imunisasi.

## Getting Started
### Pre-requisite
Sebelum menggunakan aplikasi ini, pastikan anda telah menginstal pra-syarat berikut
1. [Composer](https://getcomposer.org/)
2. [Laravel & PHP Minimal 8.0](https://www.apachefriends.org/download.html)

### Installation
Berikut adalah cara untuk melakukan Installasi SIMBA, adapun berikut adalah video untuk installasi _laravel project_ secara umum
melalui link berikut [Youtube](https://www.youtube.com/watch?v=KrsicG8gfVg)
1. Clone repo berikut (ZIP/http)

Setup Composer dan Filament: 
1. Open folder tersebut melalui `bash`/`cmd`dan lakukan **command** berikut
2. `composer install`
3. `npm install`
4. `composer require filament/forms:"3.0-stable" -W`
5. `cp .env.example .env`
6. `code .` (atau buka folder tersebut lewat code editor masing-masing)

Buka `Xampp Control Panel` dan jalankan module `Apache` dan `MySQL`:
1. Buka `localhost/phpmyadmin` dan buat database baru dengan nama berdasarkan baris `DB_DATABASE` in dalam file `.env` 

Open folder tersebut di dalam terminal _code editor_ masing-masing dan lakukan command berikut untuk setup tabel database 
1. `php artisan key:generate`
2. `php artisan migrate`

Setup data seeder jika diperlukan (**optional**)
1. `php artisan db:seed --class=WaliSeeder`
2. `php artisan db:seed --class=BalitaSeeder`
3. `php artisan db:seed --class=HistoriSeeder`

Jalankan aplikasi berikut dalam terminal code editor:
1. `php artisan serve`

## Contributing
Applikasi ini masih jauh dari kata sempurna, dan Segala bentuk kontribusi akan sangat dihargai, _feel free_ to fork this project and customized this project at _your own will_, don't forget to pull a request on this project and make this projects better.

## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Acknowledgments
This project makes use of this following _frameworks_ and _libraries_
- [Filament](https://filamentphp.com/) : Sebagai main framework dari CMS yang akan digunakan
- [Laravel](https://laravel.com/) : Sebagai extensi dari Bahasa PHP yang digunakan
