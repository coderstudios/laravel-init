<?php
/**
 * Part of the Laravel Init package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2020, Coder Studios Ltd
 *
 * @see       https://www.coderstudios.com
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Coder Studios Laravel Init variables
    |--------------------------------------------------------------------------
    |
    | cache_enabled is used to control Laravel Init caches
    | cache_duration is used to control Laravel Init cache lifetime
    | backup_dir is the backup path for the database backups command
    | theme is the folder name for the view folder theme in use in the app
    | theme_folder is the full folder path for the theme in use in the app
    |
    */

    'coderstudios' => [
        'cache_enabled' => env('APP_CACHE', 1),
        'cache_duration' => env('APP_CACHE_MINUTES', 240),
        'backup_dir' => env('APP_BACKUP_DIR', storage_path().'/app/dumps'),
        'theme' => env('APP_THEME', 'default'),
        'theme_folder' => 'theme.'.env('APP_THEME', 'default').'.',
    ],
];
