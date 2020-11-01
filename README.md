<p align="center">
    <img src="https://github.com/zgramming/REST-API-COMBO-LARAVEL/blob/main/banner_github.png" height="400">
</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# REST API Flutter Combo Laravel

## What's in here ?

## User API

### Method GET

* Get all user

<details><summary><code>http://127.0.0.1:8000/api/user/all</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil mendapatkan user",
    "data": [
        {
            "id_user": 1,
            "name_user": "zeffry",
            "password_user": "$2y$10$wdaZVlt8f3DFrGn857mqwuKs7blkTDM/BH3492WhrlgduYrbxdpnG",
            "email_user": "zeffry.reynando@gmail.com",
            "image_user": "16042402935f9ec3a5e6e91.png",
            "status_user": 0,
            "created_at": "2020-11-01T14:15:13.000000Z",
            "updated_at": "2020-11-01T14:18:13.000000Z"
        },
        {
            "id_user": 2,
            "name_user": "Syarif",
            "password_user": "$2y$10$AXw1wHETAbEjKQEuoW4cwuw2sfRB10c.WJyspic31hQja/uhP5qt2",
            "email_user": "syarifhidayatullah.net@gmail.com",
            "image_user": null,
            "status_user": 0,
            "created_at": "2020-11-01T14:21:16.000000Z",
            "updated_at": "2020-11-01T14:21:16.000000Z"
        },
        {
            "id_user": 3,
            "name_user": "Helmi Yahya",
            "password_user": "$2y$10$/AEGu4JZrWOsZNa7mdSWLOKmNCHfTTSp2jezDZwDhHe/y9mDjV8r6",
            "email_user": "helmiyahya@gmail.com",
            "image_user": null,
            "status_user": 0,
            "created_at": "2020-11-01T14:21:31.000000Z",
            "updated_at": "2020-11-01T14:21:31.000000Z"
        },
        {
            "id_user": 4,
            "name_user": "Ricky Achmad Alvieri",
            "password_user": "$2y$10$6ytUQoHc3QVtndBTkaaIveGOWv3JJnGzf3ajer1Z9sjA7SasX6lYO",
            "email_user": "engkoh@gmail.com",
            "image_user": null,
            "status_user": 0,
            "created_at": "2020-11-01T14:21:52.000000Z",
            "updated_at": "2020-11-01T14:21:52.000000Z"
        }
    ]
}
```
</p>
</details>

* Get single user

<details><summary><code>http://127.0.0.1:8000/api/user/single/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "User ditemukan",
    "data": {
        "id_user": 1,
        "name_user": "zeffry",
        "password_user": "$2y$10$wdaZVlt8f3DFrGn857mqwuKs7blkTDM/BH3492WhrlgduYrbxdpnG",
        "email_user": "zeffry.reynando@gmail.com",
        "image_user": "16042402935f9ec3a5e6e91.png",
        "status_user": 0,
        "created_at": "2020-11-01T14:15:13.000000Z",
        "updated_at": "2020-11-01T14:18:13.000000Z"
    }
}
```
</p>
</details>

### Method POST

* Login

<details><summary><code>http://127.0.0.1:8000/api/user/login</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil login",
    "data": {
        "id_user": 4,
        "name_user": "Ricky Achmad Alvieri",
        "password_user": "$2y$10$6ytUQoHc3QVtndBTkaaIveGOWv3JJnGzf3ajer1Z9sjA7SasX6lYO",
        "email_user": "engkoh@gmail.com",
        "image_user": null,
        "status_user": 0,
        "created_at": "2020-11-01T14:21:52.000000Z",
        "updated_at": "2020-11-01T14:21:52.000000Z"
    }
}
```
</p>
</details>

* Register

<details><summary><code>http://127.0.0.1:8000/api/user/register</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil registrasi , terimakasih atas waktunya untuk mencoba aplikasi ini :D"
}
```
</p>
</details>


### Method PUT

* Update Image

<details><summary><code>http://127.0.0.1:8000/api/user/updateImage/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil update gambar zeffry ",
    "data": {
        "id_user": 1,
        "name_user": "zeffry",
        "password_user": "$2y$10$wdaZVlt8f3DFrGn857mqwuKs7blkTDM/BH3492WhrlgduYrbxdpnG",
        "email_user": "zeffry.reynando@gmail.com",
        "image_user": "16042411435f9ec6f74bbed.png",
        "status_user": 0,
        "created_at": "2020-11-01T14:15:13.000000Z",
        "updated_at": "2020-11-01T14:32:23.000000Z"
    }
}
```
</p>
</details>

### Method DELETE

* Delete user

<details><summary><code>http://127.0.0.1:8000/api/user/delete/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "User berhasil dihapus"
}
```
</p>
</details>

* Delete Image

<details><summary><code>http://127.0.0.1:8000/api/user/deleteImage/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil menghapus gambar user"
}
```
</p>
</details>

___________________________________________________________________________________________________________________________________

## Product API

### Method GET

* Get all products

<details><summary><code>http://127.0.0.1:8000/api/produk/all</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Mendapatkan semua produk",
    "data": [
        {
            "id_product": 1,
            "name": "Lenovo Thinkpad T450S",
            "price": 6300000,
            "stock": 5,
            "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
            "image_product": "16042416925f9ec91c19639.png",
            "created_at": "2020-11-01T14:41:32.000000Z",
            "updated_at": "2020-11-01T14:41:32.000000Z"
        },
        {
            "id_product": 2,
            "name": "Acer Swift 7",
            "price": 10000000,
            "stock": 2,
            "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
            "image_product": "16042417165f9ec9347cb1c.png",
            "created_at": "2020-11-01T14:41:56.000000Z",
            "updated_at": "2020-11-01T14:41:56.000000Z"
        },
        {
            "id_product": 3,
            "name": "test",
            "price": 10000000,
            "stock": 2,
            "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
            "image_product": "16042417265f9ec93e69dbe.png",
            "created_at": "2020-11-01T14:42:06.000000Z",
            "updated_at": "2020-11-01T14:42:06.000000Z"
        }
    ]
}
```
</p>
</details>

* Get single product

<details><summary><code>http://127.0.0.1:8000/api/produk/single/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Produk ditemukan",
    "data": {
        "id_product": 2,
        "name": "Acer Swift 7",
        "price": 10000000,
        "stock": 2,
        "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
        "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
        "image_product": "16042417165f9ec9347cb1c.png",
        "created_at": "2020-11-01T14:41:56.000000Z",
        "updated_at": "2020-11-01T14:41:56.000000Z"
    }
}
```
</p>
</details>


### Method POST

* Insert product

<details><summary><code>http://127.0.0.1:8000/api/produk/insert</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil menambahkan produk Samsung S20 + Ultra",
    "data": {
        "id_product": 5,
        "name": "Samsung S20 + Ultra",
        "price": 10000000,
        "stock": 2,
        "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
        "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
        "image_product": "16042417865f9ec97a63539.png",
        "created_at": "2020-11-01T14:43:06.000000Z",
        "updated_at": "2020-11-01T14:43:06.000000Z"
    }
}
```
</p>
</details>

### Method UPDATE

* Update product

<details><summary><code>http://127.0.0.1:8000/api/produk/update/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Produk  Samsung S10 Basic berhasil diupdate ",
    "data": {
        "id_product": 5,
        "name": "Samsung S10 Basic",
        "price": 7000000,
        "stock": 1,
        "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
        "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
        "image_product": "16042417865f9ec97a63539.png",
        "created_at": "2020-11-01T14:43:06.000000Z",
        "updated_at": "2020-11-01T14:44:25.000000Z"
    }
}
```
</p>
</details>

* Update product image

<details><summary><code>http://127.0.0.1:8000/api/produk/updateImage/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil update gambar Samsung S10 Basic ",
    "data": {
        "id_product": 5,
        "name": "Samsung S10 Basic",
        "price": 7000000,
        "stock": 1,
        "summary": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
        "description": "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.",
        "image_product": "16042418775f9ec9d5916d7.png",
        "created_at": "2020-11-01T14:43:06.000000Z",
        "updated_at": "2020-11-01T14:44:37.000000Z"
    }
}
```
</p>
</details>

### Method DELETE

* Delete product

<details><summary><code>http://127.0.0.1:8000/api/produk/delete/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Produk berhasil dihapus"
}
```
</p>
</details>

* Delete product image

<details><summary><code>http://127.0.0.1:8000/api/produk/deleteImage/{id}</code> </summary>
<p>

```python
{
    "status": "ok",
    "message": "Berhasil menghapus gambar produk"
}
```
</p>
</details>
___________________________________________________________________________________________________________________________________

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

`php artisan migrate:refresh` 

  
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
