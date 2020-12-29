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
        DB::table('users')->truncate();
        DB::table('settings')->truncate();
        DB::table('user_roles')->truncate();
        DB::table('email_groups')->truncate();
        DB::table('languages')->truncate();
        $this->call('csinit:install');
    }
}
