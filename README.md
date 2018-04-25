<!-- TOC -->

- [Systematization GitHub Stars](#systematization-github-stars)
    - [Authors](#authors)
    - [Test URL](#test-url)
    - [Screenshots](#screenshots)
    - [Technology stack](#technology-stack)
    - [Characteristics & Requirements](#characteristics--requirements)
    - [Install](#install)
        - [Without Docker In Ubuntu 16.04](#without-docker-in-ubuntu-1604)
        - [With Docker](#with-docker)
    - [Project Organization](#project-organization)
    - [Route](#route)
    - [Route-Pic](#route-pic)
    - [Other](#other)

<!-- /TOC -->

## Systematization GitHub Stars
- This project is driven by agile development SCRUM. : )
[![CocoaPods](https://img.shields.io/cocoapods/l/AFNetworking.svg)]()

[![](https://img.shields.io/badge/Progress-90%25-yellow.svg)]()

[![Code Climate](https://img.shields.io/badge/issue-10-orange.svg)]()

[![](https://img.shields.io/badge/author-Huiming%20|%20Dinghao%20|%20Jianan%20|%20YuJia-red.svg)]()
---

### Authors
- Huiming Sun <- Back-End
- Jianan Ni <- Scrum Manager
- Hao Ding , Yujia Wang, Jianan Ni <- Front-End

### Test URL

-  http://ec2-18-221-156-187.us-east-2.compute.amazonaws.com

---

### Screenshots 

![ScreenShots](https://github.com/bamboovir/systematization_github_stars/blob/master/ReadMeIMG/777.gif)

---

### Technology stack

- Basic < HTML_5 
- Basic < CSS_3 
- Basic < JavaScript : Programming language
- Basic < PHP : Programming language
- Ad < Docker : Virtualization container
- Ad < Laravel : PHP Framework
---

###  Characteristics & Requirements 

- [x] The web application use `HTML_5` and `CSS_3` for page content and layout.

> File path : "/SysGithubStar/resources/views/*";
>
> Line : [begin : end] ;
>
> Other prompt : "it's very clear.";

- [x] The web application have a consistent design/interface.

> File path : "/SysGithubStar/resources/views/*";
>
> Line : [begin : end] ;
>
> Other prompt : "it's very clear.";

- [x] The web application is well-structured and logically organized. 

> File path : "/SysGithubStar/resources/views/*";
>
> Line : [@yield('content')];
>
> Other prompt : "Use blade As Templating engine, it's well-structured and logically organized";
>
> Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the `.blade.php` file extension and are typically stored in the `resources/views` directory.

- [x] LogIn & LogOut < Default { `Username : test `; `Passwd : pass `}.

> It's very clear.

- [x] The web application utilize PHP and proper PHP techniques.

> File path : "/SysGithubStar/app/Http/Controllers/StarController.php";
>
> Line : [Begin : End] ;
>

- [x] The web application properly use `GET` and `POST`.

> File path : "/SysGithubStar/routes/web.php";
>
> ```
> Route::get('/', function () {
>     return view('test.welcome');
> });
>
> //Authentication route
> Auth::routes();
>
> Route::get('/home', 'StarController@viewHome')->name('home');
>
> //JSON Search API 
> //Do not need to consider security, use GET method
> Route::get('/star/data/{gitHubName}/{page}', 'StarController@getJsonByGitHubNameAndPageAndUserId'); //Unregistered person without userId Not counted in database
> Route::get('/star/num/{gitHubName}', 'StarController@getPageNumByGitHubName'); //Get the number of pages corresponding to GitHubName
>
> //Database synchronization routing 
> Route::post('/star/database/sync', 'StarController@sync'); // Used to synchronize Star accept JSON parameters example {}
> Route::post('/tag/database/sync', 'TagController@sync'); // Used to synchronize Tag accept JSON parameters example {}
>
> Route::get('/test/view/{gitHubName}/{page}','StarController@viewByUserNameAndPageAndUserId')->name('searchView'); //Search View route
> Route::get('/test/download','StarController@download')->name('download'); // Used to download files offline
> ```
>
> 
>
> Other prompt : " Use properly use `GET` and `POST`.";

- [x] Supply appropriate and informative feedback if the information entered is not complete or correct.

> File path : "/SysGithubStar/resources/views/auth/*";
>
> Other prompt : "Try to register and login, you could see the feedback";

- [x] The web application contain a page where there are multiple photos presented on the page. 

> URL : "/";
>
> Other prompt : "It's very clear.";

- [x] The web application contain a page that contains a YouTube video embedded in the page.

> URL : "/";
>
> Other prompt : "It's very clear that the Install video is embedded in the page";

- [x] The web application utilize JavaScript and proper JavaScript techniques.

> File path : "/SysGithubStar/public/js/search.js";
>
> Line : [Begin : End] ;
>
> Other prompt : "It's very clear.";

- [x] The web application utilize jQuery and proper jQuery techniques.

> File path : "/SysGithubStar/public/js/search.js";
>
> Line : [Begin : End] ;
>
> Other prompt : "It's very clear.";

- [x] The web application utilize Bootstrap interface elements.

> Other prompt : "It's very clear.";

- [x] The web application utilize AJAX.

> File path : "/SysGithubStar/public/js/search.js";
>
> Line : [134 : 153] ;
>
> ```
> for(var v of star_json){
>             var star_id = v["star_id"];
>             addHookToSyncButtonByStarId(v["star_id"],star_id,function (event){
>                 var tag_unit = getTagByStarId(event.data.star_id);
>
>                 var star_unit = getStarUnitByStarId(event.data.star_id);
>                 //post to tag & star sync;
>                 var sync_tag_url = root + "/tag/database/sync";
>                 var sync_star_url = root + "/star/database/sync";
>
>                 for(var s of tag_unit){
>                     $.post(sync_tag_url,s).done(function( data ) {
>                         console.log("tag sync success");
>                     });   
>                 }
>
>                 $.post(sync_star_url,star_unit).done(function( data ) {
>                     console.log("star sync success");
>                 });
>             });
> ```
>
> 
>
> Other prompt : "It's very clear.";

### Install 

#### Without Docker In Ubuntu 16.04

- Install Composer

```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

```

- Install de

```
sudo apt-get install php-mbstring
sudo apt-get update
sudo apt-get install php-xml
```



- Install Laravel

```bash
composer create-project laravel/laravel SysGithubStar ^5.5
```

- Install Apache

- Configure The Apache Configuration File

  ```
  cd /etc/apache2/
  cd sites-available/
  sudo vim 000-default.conf
  # Change To
  DocumentRoot /var/www/html/SysGithubStar/public/
  ```

  ​

- Enable Apache rewrite mod ; make sure Laravel 's Route rules work.

  ```bash
  sudo a2enmod rewrite # install rewrite Mod
  cd /etc/apache2/
  sudo vim apache2.conf # Change The Apache Configuration File
  # Change Config in <Directory /var/www/> </Directory> : AllowOverride To AllowOverride all
  service apache2 restart # restart apache
  sudo chmod -R 777 SysGithubStar/
  ```

- Enable Auth 

```bash
./artisan | grep "auth" # Watching auth related command line arguments
php artisan make:auth #  Scaffold basic login and registration views and routes
ls -al # You can see that .env was created
mysql -u root -p passwd # Enter the database and create a new library with utf8mb4 as the default format
> CREATE DATABASE `sysgithubstar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
sudo vim .env # Edit the .env document

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sysgithubstar
DB_USERNAME=root
DB_PASSWORD=passwd

php artisan migrate # Database Migration Generated Uncreated Table
```

- Enable Email (For "Forgot Your Password & Reset Your Password")

```bash
sudo vim .env # Edit the .env document
  1 APP_NAME=yourAppName
  2 APP_ENV=local
  3 APP_KEY=yourkey
  4 APP_DEBUG=true
  5 APP_LOG_LEVEL=debug
  6 APP_URL=Your EC2 address
 25 MAIL_DRIVER=smtp
 26 MAIL_HOST=smtp.gmail.com
 27 MAIL_PORT=587
 28 MAIL_USERNAME=yourUsername
 29 MAIL_PASSWORD=yourPassword
 30 MAIL_ENCRYPTION=tls
```

- Create New Table

```
php artisan make:migration create_star_table
php artisan make:migration create_tag_table
php artisan migrate
```

- Some ugly work

```
sudo vim routes/web.php
Remove AUTH section
```



### With Docker

- Install Docker In Ubuntu 16.04

https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-16-04

- Pull Basic Ubuntu

```
docker pull docker.io/ubuntu
```

- Docker File

```
FROM ubuntu:latest

RUN apt-get update && apt-get install -y software-properties-common language-pack-en-base \
    && LC_ALL=en_US.UTF-8 add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php-xml php7.0 php7.0-fpm php7.0-mysql mcrypt php7.0-gd curl \
       php7.0-curl php-redis php7.0-mbstring sendmail supervisor \
    && mkdir /run/php \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN sed -i -e 's/listen = \/run\/php\/php7.0-fpm.sock/listen = 0.0.0.0:9000/g' /etc/php/7.0/fpm/pool.d/www.conf \
    && sed -i -e 's/;daemonize = yes/daemonize = no/g' /etc/php/7.0/fpm/php-fpm.conf

WORKDIR /var/app

EXPOSE 9000

CMD ["/usr/bin/supervisord"]
```

- Create Supervisor File

```
[supervisord]
nodaemon = true
logfile = /var/log/supervisord.log
logfile_maxbytes = 10MB
pidfile = /var/run/supervisord.pid

[program:php-fpm]
command = php-fpm7.0
user = root
autostart = true
autorestart = true
```
.... Not completed
---

### Project Organization

```
- composer composer.json , composer.lock 
(PHP's Project Package Management System Is Similar To ruby:gem ; python:pip ; java:maven;javascript:npm)
- /public place js & css
	/js app.js
	/css Bootstrap v3.3.7
- /resource Placement Front-end resources
	- /views Place A PHP Template
- /vendor Place in composer.json The dependency library described in
- /routes Place files that use to description routes rules  
- /app Backend Related Files
	- /Console Used for terminal command line
	- /Exceptions Exception
	- /Http/Controller Place Controller (MVC) 
```

## Route

```
+--------+----------+-------------------------------+------------------+-------------------------------------------------------------------------+--------------+
| Domain | Method   | URI                           | Name             | Action                                                                  | Middleware   |
+--------+----------+-------------------------------+------------------+-------------------------------------------------------------------------+--------------+
|        | GET|HEAD | /                             |                  | Closure                                                                 | web          |
|        | GET|HEAD | api/user                      |                  | Closure                                                                 | api,auth:api |
|        | GET|HEAD | home                          | home             | App\Http\Controllers\StarController@viewHome                            | web          |
|        | GET|HEAD | login                         | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                 | web,guest    |
|        | POST     | login                         |                  | App\Http\Controllers\Auth\LoginController@login                         | web,guest    |
|        | POST     | logout                        | logout           | App\Http\Controllers\Auth\LoginController@logout                        | web          |
|        | POST     | password/email                | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail   | web,guest    |
|        | POST     | password/reset                |                  | App\Http\Controllers\Auth\ResetPasswordController@reset                 | web,guest    |
|        | GET|HEAD | password/reset                | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm  | web,guest    |
|        | GET|HEAD | password/reset/{token}        | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm         | web,guest    |
|        | POST     | register                      |                  | App\Http\Controllers\Auth\RegisterController@register                   | web,guest    |
|        | GET|HEAD | register                      | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm       | web,guest    |
|        | GET|HEAD | star/data/{gitHubName}/{page} |                  | App\Http\Controllers\StarController@getJsonByGitHubNameAndPageAndUserId | web          |
|        | POST     | star/database/sync            |                  | App\Http\Controllers\StarController@sync                                | web          |
|        | GET|HEAD | star/num/{gitHubName}         |                  | App\Http\Controllers\StarController@getPageNumByGitHubName              | web          |
|        | POST     | tag/database/sync             |                  | App\Http\Controllers\TagController@sync                                 | web          |
|        | GET|HEAD | test/download                 | download         | App\Http\Controllers\StarController@download                            | web          |
|        | GET|HEAD | test/view/{gitHubName}/{page} | searchView       | App\Http\Controllers\StarController@viewByUserNameAndPageAndUserId      | web          |
+--------+----------+-------------------------------+------------------+-------------------------------------------------------------------------+--------------+

```

## Route-Pic

![route](https://github.com/bamboovir/systematization_github_stars/blob/master/ReadMeIMG/route.png)


## Other

```
According To GITHUB API：
Requests that return multiple items will be paginated to 30 items by default. You can specify further pages with the ?page parameter. For some resources, you can also set a custom page size up to 100 with the ?per_page parameter. Note that for technical reasons not all endpoints respect the ?per_page parameter, see events for example.
About Paging :
https://developer.github.com/v3/guides/traversing-with-pagination/

Link In Header:
<https://api.github.com/user/24313133/starred?page=1&q=addClass+user%3Amozilla>; rel="prev", <https://api.github.com/user/24313133/starred?page=3&q=addClass+user%3Amozilla>; rel="next", <https://api.github.com/user/24313133/starred?page=8&q=addClass+user%3Amozilla>; rel="last", <https://api.github.com/user/24313133/starred?page=1&q=addClass+user%3Amozilla>; rel="first"
```


- Enjoy & Cheers :)
