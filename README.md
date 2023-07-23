# Web-Penjadwalan-Laravel
Web penjadwalan menggunakan framework laravel
<br>
framework yang digunakan `laravel` 
<br>
laravel: `9.18.0`

# Fitur
- Tambah, hapus, ubah, lihat data siswa, mata pelajaran dan rapor
- multi level, user dan admin

# Screenshoot
<details>
    <summary>Foto Web</summary>
    <br>

|  |  |
| :---:  | :---:  |
| ![](screenshot/login.png)            | ![](screenshot/dashboard_admin.png)          
![](screenshot/siswa.png)  | ![](screenshot/matpel.png)            
![](screenshot/lihat.png)               | ![](screenshot/rapor_admin.png)   
![](screenshot/nilai_siswa.png)                            | ![](screenshot/dashboard_user.png)  
![](screenshot/ubah_password.png)            | ![](screenshot/rapor_user.png)                


</details>  

# Cara install

#### Via Git
```bash
git clone https://github.com/EriSetyawan166/web-rapot-sma.git
```

### Download ZIP
[Link](https://github.com/EriSetyawan166/web-rapot-sma/archive/refs/heads/master.zip)

### Setup Aplikasi
Jalankan perintah 
```bash
composer install --ignore-platform-reqs
```
Copy file .env dari .env.example
```bash
copy .env.example .env
```
Konfigurasi file .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```
Generate key
```bash
php artisan key:generate
```
Migrate database
```bash
php artisan migrate
```
Seeder table User dan siswa
```bash
php artisan db:seed
```

Update Composer
```bash
composer update
```

Menjalankan aplikasi
```bash
php artisan serve
```

username: admin
<br>
password: admin

## Contributors ✨
<table>
  <tr>
    <td align="center"><a href="https://github.com/EriSetyawan166"><img src="https://avatars.githubusercontent.com/u/72864742?v=4" width="100px;" alt=""/><br /><sub><b>Muhammad Eri Setyawan</b></sub></a><br/><a href="#" title="Code">💻</a> <a href="#" title="Documentation">📖</td>
  </tr>
</table>
