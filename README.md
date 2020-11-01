<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# REST API Flutter Combo Laravel

## Configuration 

After you download/fork this project, make sure in your machine already installed <a href="https://getcomposer.org/">Composer</a>. Then inside project directory running this in console/terminal `composer install`.

Before use this REST API, you have to configure a few things :
  
  
  ### 1. Database
  
a. Go to .env file and change this line with your :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DATABASE
DB_USERNAME=YOUR_USERNAME
DB_PASSWORD=YOUR_PASSWORD
```

b. In this project already have migration data **user** and **product**, make sure you already make database with same name as your above configuration in your server. Then you can write in console/terminal :

`php artisan migrate` 

  
  ### 2. Email

a. Get generate password for **MAIL_PASSWORD**

* Go to <a href="https://www.gmail.com/">Gmail</a> and login
* Click your profile avatar , then click **Manage your Google Account**
* After that click menu **Security** on left side , make sure 2-step verification is on. In same menu click **App password**
* Then you will see 2 dropdown **Select app & Select device**, my configurate is **Select app = Mail** and **Select device = Windows Computer**
* After you click button , pop up will show with your generate password. This password which you will use for email configuration in laravel **.env**

b. Go to .env file and change this line with your :

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=YOUR_GMAIL@GMAIL.COM
MAIL_PASSWORD=YOUR_GENERATE_PASSWORD_GMAIL_ABOVE
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=YOUR_FROM_ADDRESS@GMAIL.COM
MAIL_FROM_NAME="${APP_NAME}"
```
c. Go to **config/mail.php** and change these line : 

```
'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME', 'YOUR_GMAIL@GMAIL.COM'),
            'password' => env('MAIL_PASSWORD', 'YOUR_GENERATE_PASSWORD_GMAIL'),
            'timeout' => null,
            'auth_mode' => null,
        ],

```

```
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'YOUR_GMAIL'),
        'name' => env('MAIL_FROM_NAME', 'YOUR_NAME'),
    ],

```
d. If you want change design of sent email, go to **resource/customer_mail.blade.php**.This file has a function to design email

e. If you want change logic of sent email, go to `app/Http/Controllers/Api/ReusableController.php` at function **sendEmail**. You can change title of email,user detail include [name & email].

  ### 3. Storage

a. For handling storage folder to accessible in REST API ,running this command on console/terminal 
`php artisan storage:link `

with this you can access storage folder in url like `http://www.example.com/storage/images/namafile.jpg`
