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

namespace CoderStudios\LaravelInit;

use CoderStudios\LaravelInit\Libraries\EmailGroupsLibrary;
use CoderStudios\LaravelInit\Libraries\LanguageLibrary;
use CoderStudios\LaravelInit\Libraries\SettingsLibrary;
use CoderStudios\LaravelInit\Libraries\UserRolesLibrary;
use CoderStudios\LaravelInit\Libraries\UsersLibrary;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csinit:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the database data';

    /**
     * Create a new command instance.
     */
    public function __construct(SettingsLibrary $settings, UserRolesLibrary $user_roles, UsersLibrary $users, LanguageLibrary $language, EmailGroupsLibrary $email_groups)
    {
        parent::__construct();
        $this->users = $users;
        $this->settings = $settings;
        $this->language = $language;
        $this->user_roles = $user_roles;
        $this->email_groups = $email_groups;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $settings = $user_roles = $language = $email_groups = [];

        $settings[] = [
            'name' => 'mail_from_address',
            'class' => 'mail',
            'value' => 'example@example.com',
            'serialized' => 0,
        ];

        $settings[] = [
            'name' => 'mail_from_name',
            'class' => 'mail',
            'value' => 'Example',
            'serialized' => 0,
        ];

        $settings[] = [
            'name' => 'mail_mail_driver',
            'class' => 'mail',
            'value' => 'mailgun',
            'serialized' => 0,
        ];

        $settings[] = [
            'name' => 'mail_mail_encryption',
            'class' => 'mail',
            'value' => 'tls',
            'serialized' => 0,
        ];

        $settings[] = [
            'name' => 'mail_mail_enabled',
            'class' => 'mail',
            'value' => '0',
            'serialized' => 0,
        ];

        $settings[] = [
            'name' => 'config_contact_email',
            'class' => 'config',
            'value' => 'example@example.com',
            'serialized' => 0,
        ];

        $settings[] = [
            'name' => 'config_items_per_page',
            'class' => 'config',
            'value' => '25',
            'serialized' => 0,
        ];

        foreach ($settings as $setting) {
            $this->settings->create($setting);
        }

        $user_roles[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'name' => 'Anonymous',
        ];

        $user_roles[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'name' => 'Super Admin',
        ];

        $user_roles[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'name' => 'Member',
        ];

        $user_roles[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'name' => 'Power user',
        ];

        $user_roles[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'name' => 'Admin',
        ];

        foreach ($user_roles as $user_role) {
            $this->user_roles->create($user_role);
        }

        $email_groups[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'name' => 'Newsletter',
        ];

        foreach ($email_groups as $email_group) {
            $this->email_groups->create($email_group);
        }

        $language[] = [
            'enabled' => 1,
            'sort_order' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'code' => 'en-gb',
            'name' => 'English',
            'locale' => 'en-US,en_US.UTF-8,en-gb,english',
        ];

        foreach ($language as $l) {
            $this->language->create($l);
        }

        $this->info('Lets setup your admin account...');
        $email = $this->ask('What is the admin email going to be?');
        $name = $this->ask('What is the admin name?');
        $password = $this->secret('What is the password?');

        if (!empty($email) && !empty($name) && !empty($password)) {
            $this->users->create([
                'email' => $email,
                'name' => $name,
                'password' => Hash::make($password),
                'enabled' => 1,
                'email_verified_at' => date('Y-m-d H:i:s'),
                'user_role_id' => 2,
            ]);
            $this->info('Great thanks, account setup.');
        } else {
            $this->info('You need to enter appropriate information for each question, please re run the install!');
        }
    }
}
