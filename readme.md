# Melipayamak Laravel


<div dir='rtl'>

### معرفی وب سرویس ملی پیامک
ملی پیامک یک وب سرویس کامل برای ارسال و دریافت پیامک و پیامک صوتی و مدیریت کامل خدمات دیگر است که براحتی میتوانید از آن استفاده کنید.

<hr>

### نصب

<p>قبل از نصب نیاز به ثبت نام در سایت ملی پیامک دارید.</p>

[**ثبت نام به همراه دریافت 200 پیامک هدیه جهت تست وبسرویس**](http://www.melipayamak.com/)

<p>پس ازثبت نام  برای نصب از راههای زیر میتوانید اقدام کنید.</p>



</div>


```php
composer require melipayamak/laravel:1.0.0
```


<div dir='rtl'>

یا از طریق اضافه کردن خط زیر به فایل 
composer.json



</div>


```json
"melipayamak/laravel": "1.0.0"
```


<div dir='rtl'>


و سپس اجرای دستور 



</div>

    composer update



<div dir='rtl'>

#### نصب در لاراول

از لاراول ۵.۵ نیازی به انجام مراحل زیر نیست.

در قدم اول  ‍`Melipayamak\Laravel\ServiceProvider` را به لیست  `providers` ها در فایل `config\app.php` اضافه کنید. 

</div>

```php
'providers' => [
  ...
  Melipayamak\Laravel\ServiceProvider::class,
],

```
<div dir='rtl'>

سپس `facade` زیر را به لیست `aliases` ا‍ضافه کنید.

</div>

```php
'aliases' => [
  ...
  Melipayamak\Laravel\Facade::class,
],
```

<div dir='rtl'>

در نهایت فایل کانفیگ را پابلیش نمایید.
</div>

```
php artisan vendor:publish --tag="melipayamak"
```

<div dir='rtl'>

سپس  فایل کانفیگ `config/melipayamak.php` را با یوزرنیم و پسورد اکانت ملی پیامک ویرایش نمایید.
</div>

	
<div dir='rtl'>

	
	
#### نحوه استفاده
نمونه کد برای ارسال پیامک



</div>



```php
use Melipayamak;
try{

    $sms = Melipayamak::sms();
    $to = '09123456789';
    $from = '5000...';
    $text = 'تست وب سرویس ملی پیامک';
    $response = $sms->send($to,$from,$text);
    $json = json_decode($response);
    echo $json->Value; //RecId or Error Number 
}catch(Exception $e){
    echo $e->getMessage();
}
```


<div dir='rtl'>

از آنجا که وب سرویس ملی پیامک تنها محدود به ارسال پیامک نیست  شما از طریق  زیر میتوانید به وب سرویس ها دسترسی کامل داشته باشید:


</div>

```php
// وب سرویس پیامک
$smsRest = Melipayamak::sms();
$smsSoap = Melipayamak::sms('soap');
// وب سرویس تیکت پشتیبانی
$ticket = Melipayamak::ticket();
// وب سرویس برای مدیریت کامل  ارسال انبوه پیامک
$branch = Melipayamak::branch();
//وب سرویس کاربران
$users = Melipayamak::users();
//وب سرویس دفترچه تلفن
$contacts = Melipayamak::contacts()

```


<div dir='rtl'>


### دریافت لیست کامل متد ها

برای دریافت لیست کامل متد ها به آدرس زیر مراجعه کنید


[Melipayamak/melipayamak-php](https://github.com/Melipayamak/melipayamak-php)


###  اطلاعات بیشتر
برای مطالعه بیشتر به صفحه معرفی [وب سرویس ملی پیامک](https://github.com/Melipayamak/Webservices) مراجعه نمایید .


</div>
