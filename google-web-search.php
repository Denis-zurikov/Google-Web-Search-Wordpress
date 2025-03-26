<?php
/*
Plugin Name: Google Web Search
Plugin URI: https://zurikoff.ru/
Description: Добавляет на сайт поисковую строку в стиле Google для поиска по всему интернету
Version: 1.0
Author: Denis Zurikov
Author URI: https://zurikoff.ru/
*/

function google_web_search_form() {
    ob_start();
    ?>
    <style>
        .google-search-container {
            max-width: 584px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .google-search-form {
            position: relative;
        }
        .google-search-input {
            width: 100%;
            height: 44px;
            padding: 5px 40px 5px 16px;
            border: 1px solid #dfe1e5;
            border-radius: 24px;
            font-size: 16px;
            outline: none;
            box-shadow: 0 1px 6px rgba(32,33,36,0.28);
            transition: box-shadow 0.3s;
        }
        .google-search-input:hover, 
        .google-search-input:focus {
            box-shadow: 0 1px 6px rgba(32,33,36,0.38);
        }
        .google-search-button {
            background-color: #f8f9fa;
            border: 1px solid #f8f9fa;
            border-radius: 4px;
            color: #3c4043;
            font-size: 14px;
            margin: 11px 4px;
            padding: 0 16px;
            line-height: 27px;
            height: 36px;
            min-width: 54px;
            text-align: center;
            cursor: pointer;
            user-select: none;
        }
        .google-search-button:hover {
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
            background-color: #f8f9fa;
            border: 1px solid #dadce0;
            color: #202124;
        }
        .google-logo {
            margin-bottom: 20px;
        }
        .search-icon {
            position: absolute;
            right: 12px;
            top: 12px;
            color: #9aa0a6;
        }
    </style>

    <div class="google-search-container">
        <div class="google-logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="272" height="92" viewBox="0 0 272 92">
                <path fill="#4285F4" d="M115.75 47.18c0 12.77-9.99 22.18-22.25 22.18s-22.25-9.41-22.25-22.18C71.25 34.32 81.24 25 93.5 25s22.25 9.32 22.25 22.18zm-9.74 0c0-7.98-5.79-13.44-12.51-13.44S80.99 39.2 80.99 47.18c0 7.9 5.79 13.44 12.51 13.44s12.51-5.55 12.51-13.44z"/>
                <path fill="#EA4335" d="M163.75 47.18c0 12.77-9.99 22.18-22.25 22.18s-22.25-9.41-22.25-22.18c0-12.85 9.99-22.18 22.25-22.18s22.25 9.32 22.25 22.18zm-9.74 0c0-7.98-5.79-13.44-12.51-13.44s-12.51 5.46-12.51 13.44c0 7.9 5.79 13.44 12.51 13.44s12.51-5.55 12.51-13.44z"/>
                <path fill="#FBBC05" d="M209.75 26.34v39.82c0 16.38-9.66 23.07-21.08 23.07-10.75 0-17.22-7.19-19.66-13.07l8.48-3.53c1.51 3.61 5.21 7.87 11.17 7.87 7.31 0 11.84-4.51 11.84-13v-3.19h-.34c-2.18 2.69-6.38 5.04-11.68 5.04-11.09 0-21.25-9.66-21.25-22.09 0-12.52 10.16-22.26 21.25-22.26 5.29 0 9.49 2.35 11.68 4.96h.34v-3.61h9.25zm-8.56 20.92c0-7.81-5.21-13.52-11.84-13.52-6.72 0-12.35 5.71-12.35 13.52 0 7.73 5.63 13.36 12.35 13.36 6.63 0 11.84-5.63 11.84-13.36z"/>
                <path fill="#4285F4" d="M225 3v65h-9.5V3h9.5z"/>
                <path fill="#34A853" d="M262.02 54.48l7.56 5.04c-2.44 3.61-8.32 9.83-18.48 9.83-12.6 0-22.01-9.74-22.01-22.18 0-13.19 9.49-22.18 20.92-22.18 11.51 0 17.14 9.16 18.98 14.11l1.01 2.52-29.65 12.28c2.27 4.45 5.8 6.72 10.75 6.72 4.96 0 8.4-2.44 10.92-6.14zm-23.27-7.98l19.82-8.23c-1.09-2.77-4.37-4.7-8.23-4.7-4.95 0-11.84 4.37-11.59 12.93z"/>
                <path fill="#EA4335" d="M35.29 41.41V32H67c.31 1.64.47 3.58.47 5.68 0 7.06-1.93 15.79-8.15 22.01-6.05 6.3-13.78 9.66-24.02 9.66C16.32 69.35.36 58.93.36 46.26c0-12.67 9.66-24.01 24.48-24.01 6.99 0 12.48 2.69 16.85 7.43l-6.9 6.64c-2.77-2.69-6.38-4.45-10.75-4.45-8.4 0-14.69 6.89-14.69 15.03 0 8.14 6.29 14.69 14.69 14.69 8.32 0 11.93-5.71 12.85-10.01H35.29z"/>
            </svg>
        </div>
        <form class="google-search-form" action="https://www.google.com/search" method="get" target="_blank">
            <div style="position: relative;">
                <input class="google-search-input" type="text" name="q" placeholder="Поиск в Google..." autocomplete="off">
                <svg class="search-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
            </div>
            <div style="margin-top: 18px;">
                <button class="google-search-button" type="submit">Поиск в Google</button>
                <button class="google-search-button" type="submit" name="btnI" value="Мне повезёт!">Мне повезёт!</button>
            </div>
        </form>
    </div>
    <?php
    return ob_get_clean();
}

function register_google_search_shortcode() {
    add_shortcode('google_search', 'google_web_search_form');
}
add_action('init', 'register_google_search_shortcode');