<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this project
This project is set up with ddev and Laravel.

to set this project up easily yourself you can install DDEV as well. 

1. install ddev
2. pull this project
3. go to the root folder of this project
4. run ddev start
5. use the .env.example and fill it in.
6. in the .env file set YOUTUBE_API_KEY to your own API key
7. run ddev launch

if it doesnt launch try to do a composer install. If it doesnt launch after that there is probably somthing wrong with the DDEV installation. Contact me for more info.

If you decide not to use ddev then follow these steps:
1. php artisan serve --port=8080 
2. use the .env.example and fill it in.
3. in the .env file set YOUTUBE_API_KEY to your own API key

Because this project doesnt use a database or any other services you can just run it like that! But yeah I wanted to Dockerize the project.


## ROUTES

For all videos go to
/api/videos

for videos by country go to
/api/videos/{country}

the following countries are supported:

UK = 'UnitedKingdom';
NL = 'Netherlands';
DE = 'Germany';
FR = 'France';
ES = 'Spain';
IT = 'Italy';
GR = 'Greece';

you should use the full name of the country!


##TODO
* Get more results and add caching so we only have to fetch results once a day (on the first request).
* add pagination to API.
* add error handling


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
