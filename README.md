## Panduan instalasi

 1. `git clone https://github.com/coboi/kasir.git` atau, download zip
 2. `composer install`
 3. sesuaikan file .env dengan konfigurasi database

```DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kasir
DB_USERNAME=root
DB_PASSWORD=
```

4. `php artisan migrate`
5. `php artisan db:seed`
6. `php artisan serve`

## Akun

 - Admin
	 - Email: paidi@admin.com
	 - Password: a
- Petugas
	- Email: sugeng@petugas.com
	- Password: a

