## About Aplication

Aplikasi ini diperuntukan untuk Tugas Akhir dalam program Virtual Internship Experience (VIX) yang diselenggarakan oleh Investree dan Rakamin.

Aplikasi ini adalah aplikasi blog sederhana dengan basic laravel schema dengan schema tambahan sbb :

**Articles**

id
title
content
image
user_id
category_id

**Categories**

id
name
user_id

## Quick Start

### API USAGE

Anda dapat menggunakan API dalam aplikasi ini. Salah satunya bisa dengan sharing postman collection yang sudah saya buat :
[Postman Collection Sharing](https://martian-firefly-817816.postman.co/workspace/API-Training~3b732b17-d3ac-42dc-9943-56bba975732b/collection/11484527-3d87702f-4143-457e-a671-aad4b7daa027?action=share&creator=11484527).

_Setting Environment_
Beberapa Variable yang perlu disetting untuk penggunaan API :
**authToken** Variable yang menampung token Authorization. Token ini dapat ditemukan ketika Login dengan user yang tepat.
**Url** Variable yang menampung alamat root website yang dijalankan misal : http://rakamin-final-task.test yang nantinya tidak perlu report menghubungkan ke endpoint/Route yang lainnya.
**accType** Variable yang menampung tipe aplikasi yang dijalankan. Karna di POSTman saya biasa menjalankan dengan header "Accept" tambahan yang biasa bernilai "application/json"

_API Features_
Beberapa fitur yang dapat dilakukan pada aplikasi :
**Login** Fitur login dengan method post yang ini adalah awal penggunaan API untuk mendapatkan Token. jika berhasil akan mendapat response seperti :

```
{
    "code": 200,
    "message": "Success Loging in",
    "data": {
        "user": {
            "id": 5,
            "name": "user",
            "email": "user@gmail.com",
            "email_verified_at": "2022-10-15T05:37:03.000000Z",
            "created_at": "2022-10-15T05:37:04.000000Z",
            "updated_at": "2022-10-15T05:37:04.000000Z"
        },
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNjAzNzM5ZDU0Y2NiOTQ4N2NjMmJjNzdiZmJlZDAzNDgyNmRmNGIwYmE4ODRlM2YyNDk1ZjkyZmQ2NTZmNmIxY2QzMmIyZjU3Zjg5NzIwNTciLCJpYXQiOjE2NjcxMzgxMTMsIm5iZiI6MTY2NzEzODExMywiZXhwIjoxNjk4Njc0MTExLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.PypzdgcCkFs-l_PURAlGSZn08oI4nnkziW4x213WfN1vLwu7APmjGs1RWXhZY_BnCIdM5W6OPwU2HgsJkal0hqTf9H4J6zTW4Sxcp-qLDdiLDngYLm5w566VT-JhpnbVrLFPVUOo9dqkAcSAxxoDN6MxL-qz54RE_fCZx4nmzv8s6-UkXfdxIVh2NNd5u_u8zS-mU4x1E--s7RAKLlURxa0lePaO8n7nr1h7MctSdHWDiJfe5sPjEYjr07MD7zS6t4AjiI4oE4GJti0KyIq3KfWUGKCu1JDSYTePSwglLnWtxwO42bnZ-CpBtoNcjwcW-1o-lyaB9duIr6G8tp0bGVgTrxGv0-jSWS0VIZ20zvEIA2vCmsfNmGRZUrs8hmEEr19E_HkFuz-ruLstvNNBw_99lFdTzqhvkRxrJH62jcX9Ma82_2nK-3Pnf4VuT1oBxDuOCl-BreGfh_t3d22RsAzMHyiVWXBd2glnj2YB25ydiU0q-88ICVsrZ4rVOqh4vfnVt3jDczW3BGUeXMj-M68wyl56h63saI4vukUUZmvAjI3A9YzoC2Om73Vzqm7v4Kj8C16UJzqDioJs9DIqey-8Jk6779xfCwPSeghcWkuY0cYAUJxwQ67-r6z7MyilUlxGnbbpPLZSwB5HrSYLxfzgnXaFjGvry1Av7YKPOBI"
    }
}
```

**Logout** Fitur untuk revoke token dan logout sehingga token tidak bisa dipakai lagi.
**Get All Users** Fitur untuk melihat user lain
**Get All User's Articles** Fitur untuk mendapatkan artikel yang dimiliki oleh user yang login
**Detail Article** Fitur untuk melihat suatu artikel secara detail
**Create Article** Fitur untuk membuat artikel baru.
**Update Article** Fitur untuk update artikel yang sudah ada.
**Delete Article** Fitur untuk menghapus suatu artikel.

### Blog Sederhana

Pada bagian blog sederhana. Anda dapat langsung mencobanya dengan langsung migrate & seed. Karena sudah dibuatkan seeder untuk testing.
Salah satu User yang sudah dibuat seed nya adalah dengan informasi :

**Email :** user@gmail.com
**Password :** 123

dengan detail akun diatas anda dapat langsung mencoba login dengan akun testing tsb.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
