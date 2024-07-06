![445](https://github.com/i5z1a/super-language-switcher/assets/169618095/405166e5-de98-4745-9600-8bc1b9bf5d73)

# Super Language Switcher (SLS) Package for Laravel

Super Language Switcher (SLS) integrates multilingual support into Laravel effortlessly. It adapts website layouts for languages like Arabic and English, switching between RTL and LTR seamlessly.

---

## Installation

1. **Install via Composer**

    You can install the package via Composer. Run this command in your terminal from your project directory:
    
    ```bash
    composer require i5z1a/super-language-switcher
    ```

2. **Register Service Provider**

    Add the Super Language Switcher service provider to your `config/app.php` file:
    
    ```php
    // config/app.php
    
    'providers' => [
        // Other service providers...
        I5z1a\SuperLanguageSwitcher\Providers\SuperLanguageSwitcherServiceProvider::class,
    ];
    ```

    **Note:** This step is required for all Laravel versions except Laravel 11, as Laravel 11 no longer requires manual service provider registration.

3. **Publish Configuration (Optional)**

    Optionally, publish the configuration file if you need to customize any settings:
    
    ```bash
    php artisan vendor:publish --provider="I5z1a\SuperLanguageSwitcher\Providers\SuperLanguageSwitcherServiceProvider"
    ```

4. **Usage**

    Use the provided artisan command to install language files:
    
    ```bash
    php artisan language-switcher:install
    ```

##### ✅ Now the Super Language Switcher (SLS) package is ready for your project!

---

## Frontend

1. **Language selection list**
---

Made with ❤ by <a href="https://github.com/i5z1a/">@i5z1a</a> to make developers' lives easier | All rights reserved.
