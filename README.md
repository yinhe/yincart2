## Yincart  2.0.0 Beta 
[Offical WebSite](http://yincart.com)
core support by mincms(http://mincms.com).
## Technology
* [Yii 2](http://github.com/yiisoft/yii2)
* [BootStrap 3](http://getbootstrap.com/)
* [Composer](http://getcomposer.org)

## REQUIREMENTS
* PHP_VERSION 5.3.11 +
* MCrypt, GD, Reflection, PCRE, SPL, MBString, Intl  extends
* Apache Rewrite 

## install   

### step 1 [Download Composer] 

windows  [Composer Download](http://getcomposer.org/Composer-Setup.exe)

Linux  Composer Download
```
curl -sS https://getcomposer.org/installer | php
```
or 
```
php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
```
### step 2 [install Composer]
```
  git clone git@github.com:mincms/mincms.git
  cd packages 
```
Windows
```
   Composer install	
```
Linux
```
php composer.phar install   
```
### step 3 [vhosts config]
httpd-vhosts `yourdomain` is your custom domain
```
<VirtualHost *:80>
    ServerAdmin your@your-email.address
    DocumentRoot "/your-path/mincms/app/web"
    ServerName yourdomain
    ErrorLog "logs/mincms-error.log"
    CustomLog "logs/mincms.log" common
</VirtualHost>
```

### step 4 [install mincms]
visite `http://yourdomain` it will show default page. there is install link.if your didn't installed mincms before.

backend link `http://yourdomain/admin.html` 

## MinCMS Content Manage System Functions
* packages is for comm application.such as modules,widget ,config and so on.
* there is a Composer install under packages dir. so you need `Composer install`
* auth module support access for user groups.
* email module support send mailer to some one
* content module ,this is very powerful module.it is easy create many kinds of contents.
* imageache module ,real cool module ,it it easy set image effect such as resize crop and so on
* for more great functions. install it. lol :)
 
### MinCMS STRUCTS
```
packages                    
	application/        comm packages. contain modules,widget ETC,alias is @application
	web/                web code for app/web  you can use LN to app/web
	vendor/             composer autoload
	runtime/	    cache before Yii2 bootstrap
app
	protected/          	    application code
		controllers/        controllers
		hook/		    hooks
		models/             
		runtime/            cache
		config/             website config such as database  
		modules/            modules for @app the name can't the same as @application/modules
	web/          	    website root
```


## Documents
on writing ...

## License
Fair License. 

MinCMS is free for which website footer contain use php output the code `echo copyRight()`,

or contian `PowerBy <a href='http://yincart.com'>Yincart</a>` infomation.

If you want remove footer PowerBy Infomation.

Get a License for your website from our [offical website](http://yincart.com).


## Connect US 
```
QQ group：227575466
Email: yhxxlm@gmail.com
```
 


