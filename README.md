![445](https://github.com/i5z1a/super-language-switcher/assets/169618095/405166e5-de98-4745-9600-8bc1b9bf5d73)

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
