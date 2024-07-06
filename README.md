![445](https://github.com/i5z1a/super-language-switcher/assets/169618095/405166e5-de98-4745-9600-8bc1b9bf5d73)

# Super Language Switcher (SLS) Package for Laravel

Super Language Switcher (SLS) integrates multilingual support into Laravel effortlessly. It adapts website layouts for languages like Arabic and English, switching between RTL and LTR seamlessly.

---

## Installation

1. **Install via Composer**

    You can install the package via Composer. Run this command in your terminal from your project directory:
    
    ```bash
    composer require i5z1a/super-language-switcher:dev-main
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

   Add this list to the header or any page.
   ```html
   <!-- Language Switch Menu -->
    <select id="languageSelect">
        <option value="ar">العربية</option>
        <option value="en">English</option>
    </select>
   ```
   Include JS code in the header of the page or any page (💡) Tip: Include JS code in a place where all pages can access it to include it, for example the site header.
   ```html
   <!-- Include JavaScript -->
   <script src="{{ asset('js/translations.js') }}"></script>
   ```

1. **Translations**

   To add translations you can go to the path (public\lang) and view the language files in JSON format, and the (SLS) package adds Arabic and English by default.

   You can also easily add different languages ​​later. Through these language files you can add translations to your page content, for example:

   ```json
   {
      "welcome_message": "اهلا بموقعنا",
      "about_us_link": "عنا",
      "contact_us_link": "تواصل",
    }
   ```
   And then the English file as well:
   ```json
    {
        "welcome_message": "Welcome to our site!",
        "about_us_link": "About Us",
        "contact_us_link": "Contact Us",
    }
   ```

   Note that we used the same keys in all language files to display them easily in the front-end

   As shown here in the example:
   ```html
   <!-- Example placeholders -->
    <div data-translate="welcome_message"></div>
    <a class="translate-link" data-translate="about_us_link" href="#"></a>
    <a class="translate-link" data-translate="contact_us_link" href="/login"></a>
   ```
   With `data-translate` we can enter the translation key to display the text from JSON files.

##### ✅ Now your Laravel project supports multiple languages ​​easily and without any routing.
---

Made with ❤ by <a href="https://github.com/i5z1a/">@i5z1a</a> to make developers' lives easier | All rights reserved.
