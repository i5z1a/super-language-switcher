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
function storeLanguageSelection(langCode) {
    localStorage.setItem('selectedLanguage', langCode);
}

function loadStoredLanguage() {
    return localStorage.getItem('selectedLanguage') || 'ar'; // Default to Arabic
}

let currentLanguage = loadStoredLanguage();

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

function translateTexts(data) {
    // Translate elements with data-translate attribute
    document.querySelectorAll('[data-translate]').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (data[key]) {
            element.innerText = data[key];
        }
    });

    // Translate elements with specific class (if needed)
    document.querySelectorAll('.translate-link').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (data[key]) {
            element.innerText = data[key];
        }
    });
}

function switchLanguage(langCode) {
    loadLanguage(langCode)
        .then(data => {
            currentLanguage = langCode;
            storeLanguageSelection(langCode);
            translateTexts(data);

            // Set text direction
            const htmlElement = document.documentElement;
            htmlElement.setAttribute('dir', langCode === 'ar' ? 'rtl' : 'ltr');
        })
        .catch(error => {
            console.error('Error switching language', error);
        });
}

function switchToArabic() {
    switchLanguage('ar');
}

function switchToEnglish() {
    switchLanguage('en');
}

// Load default language on page load
document.addEventListener('DOMContentLoaded', function() {
    switchLanguage(currentLanguage);
});

// Attach click event listeners to language switch buttons
document.getElementById('englishBtn').addEventListener('click', switchToEnglish);
document.getElementById('arabicBtn').addEventListener('click', switchToArabic);
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
