![445]([https://github.com/i5z1a/super-language-switcher/assets/169618095/405166e5-de98-4745-9600-8bc1b9bf5d73](https://private-user-images.githubusercontent.com/169618095/346246448-405166e5-de98-4745-9600-8bc1b9bf5d73.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTUiLCJleHAiOjE3MjAyMzQzNjUsIm5iZiI6MTcyMDIzNDA2NSwicGF0aCI6Ii8xNjk2MTgwOTUvMzQ2MjQ2NDQ4LTQwNTE2NmU1LWRlOTgtNDc0NS05NjAwLThiYzFiOWJmNWQ3My5wbmc_WC1BbXotQWxnb3JpdGhtPUFXUzQtSE1BQy1TSEEyNTYmWC1BbXotQ3JlZGVudGlhbD1BS0lBVkNPRFlMU0E1M1BRSzRaQSUyRjIwMjQwNzA2JTJGdXMtZWFzdC0xJTJGczMlMkZhd3M0X3JlcXVlc3QmWC1BbXotRGF0ZT0yMDI0MDcwNlQwMjQ3NDVaJlgtQW16LUV4cGlyZXM9MzAwJlgtQW16LVNpZ25hdHVyZT1hNGIwMzExMGYxZDAzOWYzMmRkOGE5MGY3ODhmZmE2OGE5YzRjNGFhYWMyOTI4MmIyOWQ0NDVkYmFiNzgwOWQzJlgtQW16LVNpZ25lZEhlYWRlcnM9aG9zdCZhY3Rvcl9pZD0wJmtleV9pZD0wJnJlcG9faWQ9MCJ9.T2ThZtsY1xxmY6D2Ig7EcLMhLpz1ojiS4TnB5K2EhOY))

# Super Language Switcher (SLS) Package for Laravel

Super Language Switcher (SLS) is a lightweight and fast JavaScript package designed to seamlessly integrate multilingual support into Laravel applications. It supports languages such as Arabic, English, and others, and automatically adjusts the website layout between RTL (Right-to-Left) and LTR (Left-to-Right) based on the selected language.

## Installation

### 1. Install via Composer

You can install the package via Composer. Run this command in your terminal from your project directory:

```bash
composer require i5z1a/super-language-switcher
```

### 2. Register Service Provider

Add the Super Language Switcher service provider to your `config/app.php` file:

```php
// config/app.php

'providers' => [
    // Other service providers...
    I5z1a\SuperLanguageSwitcher\Providers\SuperLanguageSwitcherServiceProvider::class,
];
```

**Note:** This step is required for all Laravel versions except Laravel 11, as Laravel 11 no longer requires manual service provider registration.

### 3. Publish Configuration (Optional)

Optionally, publish the configuration file if you need to customize any settings:

```bash
php artisan vendor:publish --provider="I5z1a\SuperLanguageSwitcher\Providers\SuperLanguageSwitcherServiceProvider"
```

### 4. Usage

Use the provided artisan command to install language files:

```bash
php artisan language-switcher:install
```

---

This reformatted version should be clearer and easier to follow for users visiting your GitHub repository. Let me know if you need any further adjustments!
