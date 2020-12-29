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

namespace CoderStudios\LaravelInit\Commands;

use DB;
use Illuminate\Console\Command;

class Reset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csinit:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the database data';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Resetting the Laravel Init data tables (drop and re-create)...');
        $answer = $this->ask('Do you want to empty the users table? Y/N');
        if ('yes' === strtolower($answer) || 'y' === strtolower($answer)) {
            DB::table('users')->truncate();
        }
        $answer = $this->ask('Do you want to empty the settings table? Y/N');
        if ('yes' === strtolower($answer) || 'y' === strtolower($answer)) {
            DB::table('cs_settings')->truncate();
        }
        $answer = $this->ask('Do you want to empty the user roles table? Y/N');
        if ('yes' === strtolower($answer) || 'y' === strtolower($answer)) {
            DB::table('cs_user_roles')->truncate();
        }
        $answer = $this->ask('Do you want to empty the email groups table? Y/N');
        if ('yes' === strtolower($answer) || 'y' === strtolower($answer)) {
            DB::table('cs_email_groups')->truncate();
        }
        $answer = $this->ask('Do you want to empty the languages table? Y/N');
        if ('yes' === strtolower($answer) || 'y' === strtolower($answer)) {
            DB::table('cs_languages')->truncate();
        }
        $this->call('csinit:install');
    }
}
