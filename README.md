<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Blog Post with ability to comments and likes
This Application was built with Laravel framework version 11 and mysql 8.0 as the database engine.

This web API Enable Author to create Blogs Update and Delete blog and also give room for Author to create Post under a specific blog and publish
whereas users can view the blog post comments uncomments, likes and unlike the posts as the case maybe.

## How to setup the project

1.Run git clone https://github.com/smartklean/blogPost.git
2.Run composer update
3.Run cp .env.example .env
4.Run php artisan key:generate
5.Run php artisan migrate
6. Run php artisan db:seed
7.Run php artisan serve
