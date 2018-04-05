## Systematization GitHub Stars

---

### Test URL

-  http://asdfasdfasdf

---

### Screenshots 

[](***.gif)

---

### Technology stack

- Basic < HTML_5 
- Basic < CSS_3 
- Basic < JavaScript : Programming language
- Basic < PHP : Programming language
- Ad < Docker : Virtualization container
- Ad < Laravel : PHP Framework
- Ad < Vue.js : Framework

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

### Usage

``` 

```

### Install 

#### without docker in Ubuntu

- Install Composer

```bash
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

- Install Laravel

```bash
composer create-project laravel/laravel SysGithubStar ^5.5
```

- Install Apache

- 配置 Apache 配置文件

  ```
  cd /etc/apache2/
  cd sites-available/
  sudo vim 000-default.conf
  # 更改 为 
  DocumentRoot /var/www/html/SysGithubStar/public/
  ```

  ​

- Enable Apache rewrite mod ; make sure Laravel 's Route rules work.

  ```bash
  sudo a2enmod rewrite # 引入Mod
  sudo vim apache2.conf # 更改 apache 配置文件
  # 将 <Directory /var/www/> </Directory> 中 AllowOverride 项 改成 AllowOverride all
  service apache2 restart # 重启 apache
  ```

- Enable Auth 

```bash
./artisan | grep "auth" # 观看和 auth 相关的命令行参数 
php artisan make:auth #  Scaffold basic login and registration views and routes
ls -al # 可以看到 .env 已被创建
mysql -u root -p passwd # 进入数据库 并 创建一个 以 utf8mb4 为默认格式的新库
> CREATE DATABASE `sysgithubstar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
sudo vim .env # 编辑 .env 文档
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sysgithubstar
DB_USERNAME=root
DB_PASSWORD=passwd
php artisan migrate # 数据库迁移 生成 未创建的表
```

- Enable Email (For "Forgot Your Password & Reset Your Password")

```bash
sudo vim .env # 编辑 .env 文档
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



### With Docker

- Install Docker


---

### 项目组织

```
- composer 类文件 composer.json , composer.lock 
(PHP 项目包管理系统类似于 ruby:gem ; python:pip ; java:maven;javascript:npm)
- /public 放置 js & css
	/js app.js
	/css Bootstrap v3.3.7
- /resource 放置 前端资源
	- /views 放置 PHP 模板
- /vendor 放置 在 composer.json 中 描述的依赖库
- /routes 放置 描述 routes rules 的文件 
- /app 后端相关文件
	- /Console 用于终端命令行
	- /Exceptions 异常
	- /Http/Controller 放置Controller 用于(MVC) 
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
根据 GITHUB API：
Requests that return multiple items will be paginated to 30 items by default. You can specify further pages with the ?page parameter. For some resources, you can also set a custom page size up to 100 with the ?per_page parameter. Note that for technical reasons not all endpoints respect the ?per_page parameter, see events for example.
关于分页:
https://developer.github.com/v3/guides/traversing-with-pagination/

header 中 Link:
<https://api.github.com/user/24313133/starred?page=1&q=addClass+user%3Amozilla>; rel="prev", <https://api.github.com/user/24313133/starred?page=3&q=addClass+user%3Amozilla>; rel="next", <https://api.github.com/user/24313133/starred?page=8&q=addClass+user%3Amozilla>; rel="last", <https://api.github.com/user/24313133/starred?page=1&q=addClass+user%3Amozilla>; rel="first"
```



```
页面导航
/ -> index.php (上面字符串视频嵌入 下面是用过的人的截图和评论 中间是去主页面的按钮) -> 
-> systar_home.php (主功能区 搜索框 错误提示 通过 jQuery post UserName 到 返回 JSON ,根据返回的JSON javascript 构造 前端) (同时可以解析 经过用户处理的JSON 并显示出来) 用户可以给UNIT 添加 description 和 Tag）（为了根据界面逆向生成相应的JSON，需要一个新的parseHTML -> JSON 的javascript函数）（使用JSON 生成 Markdown 文件）
-> systar_fun.php (根据 POST 过来的数据 来 获取 JSON map 到 新 JSON)
```



- Enjoy & Cheers :)