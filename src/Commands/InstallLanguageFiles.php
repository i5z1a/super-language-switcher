<?php

namespace I5z1a\SuperLanguageSwitcher\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallLanguageFiles extends Command
{
    protected $signature = 'language-switcher:install';
    protected $description = 'Install the language switcher files';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Define paths
        $jsPath = public_path('js');
        $langPath = public_path('lang');

        // Create directories if they do not exist
        if (!File::exists($jsPath)) {
            File::makeDirectory($jsPath, 0755, true);
            $this->info('Created directory: '.$jsPath);
        }
        if (!File::exists($langPath)) {
            File::makeDirectory($langPath, 0755, true);
            $this->info('Created directory: '.$langPath);
        }

        // Create translations.js
        $jsContent = <<<EOL
// Function to store selected language in localStorage
function storeLanguageSelection(langCode) {
    localStorage.setItem('selectedLanguage', langCode);
}

// Function to load language from localStorage or default to Arabic
function loadStoredLanguage() {
    return localStorage.getItem('selectedLanguage') || 'ar'; // Default to Arabic if no selection found
}

// Default language
let currentLanguage = loadStoredLanguage(); // Load stored language or default to Arabic

// Function to load language JSON based on language code
function loadLanguage(langCode) {
    return fetch('/lang/' + langCode + '.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Language file not found');
            }
            return response.json();
        })
        .catch(error => {
            console.error('Error loading language file', error);
        });
}

// Function to translate text based on data-translate attribute
function translateTexts(data) {
    // Translate elements with data-translate attribute
    document.querySelectorAll('[data-translate]').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (data[key]) {
            element.innerText = data[key];
        }
    });

    // Example: Translate elements with specific class (if needed)
    document.querySelectorAll('.translate-link').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (data[key]) {
            element.innerText = data[key];
        }
    });
}

// Function to switch language and set text direction
function switchLanguage(langCode) {
    loadLanguage(langCode)
        .then(data => {
            // Update current language
            currentLanguage = langCode;
            // Store language selection in localStorage
            storeLanguageSelection(langCode);

            // Translate all elements
            translateTexts(data);

            // Set text direction
            const htmlElement = document.documentElement;
            htmlElement.setAttribute('dir', langCode === 'ar' ? 'rtl' : 'ltr');
        })
        .catch(error => {
            console.error('Error switching language', error);
        });
}

// Function to switch language to Arabic
function switchToArabic() {
    switchLanguage('ar');
}

// Function to switch language to English
function switchToEnglish() {
    switchLanguage('en');
}

// Function to switch language to Chinese
function switchToChinese() {
    switchLanguage('zh');
}

// Example: Load default language on page load
document.addEventListener('DOMContentLoaded', function() {
    switchLanguage(currentLanguage); // Load stored language or default (Arabic)
});

// Attach click event listeners to language switch buttons
document.getElementById('englishBtn').addEventListener('click', switchToEnglish);
document.getElementById('arabicBtn').addEventListener('click', switchToArabic);
document.getElementById('chineseBtn').addEventListener('click', switchToChinese);
EOL;

        File::put($jsPath.'/translations.js', $jsContent);
        $this->info('Created file: '.$jsPath.'/translations.js');

        // Create en.json
        $enContent = <<<EOL
{
    "short_name": "Translation here"
}
EOL;

        File::put($langPath.'/en.json', $enContent);
        $this->info('Created file: '.$langPath.'/en.json');

        // Create ar.json
        $arContent = <<<EOL
{
    "short_name": "الترجمة هنا"
}
EOL;

        File::put($langPath.'/ar.json', $arContent);
        $this->info('Created file: '.$langPath.'/ar.json');
    }
}
