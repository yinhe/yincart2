## Yincart  2.0.0 Beta 
[Offical WebSite](http://yincart.com)
packages is from  [mincms](https://github.com/mincms/mincms).
## Technology
* [Yii 2](http://github.com/yiisoft/yii2)
* [BootStrap 3](http://getbootstrap.com/)
* [Composer](http://getcomposer.org)

## REQUIREMENTS
* PHP_VERSION 5.3.11 + 
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

### step 4 [install yincart]
visite `http://yourdomain` it will show default page. there is install link.if your didn't installed yincart before.

backend link `http://yourdomain/admin.html` 
 
 
### APPLICATION STRUCTS
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
 
## Connect US 
```
QQ group：227575466
Email: yhxxlm@gmail.com
```
 


