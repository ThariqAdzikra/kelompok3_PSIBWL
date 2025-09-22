Git Workflow 

Linux / MacOS (Terminal)
1. Clone repo
git clone https://github.com/ThariqAdzikra/kelompok3_PSIBWL.git
cd kelompok3_PSIBWL

2. Buat branch baru (misal: setup-database)
git checkout -b (nama branch)

3. Cek branch aktif
git branch

4. Tambah & commit perubahan
git add .
git commit -m "Pesan commit"

5. Push branch ke GitHub
git push -u origin setup-database

6. Update branch dari main (jika ada update di main)
git checkout main
git pull origin main
git checkout (nama branch)
git merge main

7. Buat Pull Request (PR)
Buka GitHub → pilih branch → klik "Compare & Pull Request"

Windows (PowerShell / Git Bash)
1. Clone repo
git clone https://github.com/ThariqAdzikra/kelompok3_PSIBWL.git
cd kelompok3_PSIBWL

2. Buat branch baru (misal: setup-database)
git checkout -b (nama branch)

3. Cek branch aktif
git branch

4. Tambah & commit perubahan
git add .
git commit -m "Pesan commit"

5. Push branch ke GitHub
git push -u origin setup-database

6. Update branch dari main (jika ada update di main)
git checkout main
git pull origin main
git checkout setup-database
git merge main

7. Buat Pull Request (PR)
Buka GitHub → pilih branch → klik "Compare & Pull Request"

Catatan Penting!!
1. Selalu kerja di branch fitur, jangan langsung di main.
2. Gunakan pesan commit jelas, misal:
   git commit -m "Menambahkan migrasi tabel users"
3. Jangan commit:
   vendor/
   node_modules/
   .env
4. file .env tidak akan terpush jadi copy paste .env-example lalu rename jadi .enc

Pastikan .gitignore sudah benar.

# Laravel Project

![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

[![Build Status](https://github.com/laravel/framework/workflows/tests/badge.svg)](https://github.com/laravel/framework/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/framework)

---

## 📌 About Laravel

Laravel is a web application framework with expressive, elegant syntax. It simplifies common tasks such as:

- [Routing](https://laravel.com/docs/routing)
- [Dependency Injection](https://laravel.com/docs/container)
- [Session & Cache Management](https://laravel.com/docs/session)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Database Migrations](https://laravel.com/docs/migrations)
- [Queue Processing](https://laravel.com/docs/queues)
- [Event Broadcasting](https://laravel.com/docs/broadcasting)

Laravel is scalable, well-documented, and supported by a vibrant community.

---

## 🚀 Learning Resources

- 📚 [Laravel Documentation](https://laravel.com/docs)
- 🧪 [Laravel Bootcamp](https://bootcamp.laravel.com)
- 🎥 [Laracasts](https://laracasts.com) – thousands of video tutorials on Laravel, PHP, and JavaScript.

---

## 🤝 Laravel Sponsors

Special thanks to our premium partners:

- [Vehikl](https://vehikl.com)
- [Tighten Co.](https://tighten.co)
- [Kirschbaum Development Group](https://kirschbaumdevelopment.com)
- [64 Robots](https://64robots.com)
- [Curotec](https://www.curotec.com/services/technologies/laravel)
- [DevSquad](https://devsquad.com/hire-laravel-developers)
- [Redberry](https://redberry.international/laravel-development)
- [Active Logic](https://activelogic.com)

---

## 🛠️ Contributing

Thinking of contributing? Check out the [Contribution Guide](https://laravel.com/docs/contributions).

---

## 📜 Code of Conduct

Please read and follow the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct) to keep the community welcoming.

---

## 🔐 Security

If you discover a security vulnerability, please email [Taylor Otwell](mailto:taylor@laravel.com). All issues will be addressed promptly.

---

## 📄 License

Laravel is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
