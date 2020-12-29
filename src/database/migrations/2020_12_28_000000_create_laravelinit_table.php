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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaravelInitTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('cs_user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->index()->default(1);
            $table->integer('sort_order')->default(0)->index();
            $table->timestamps();
            $table->string('name', 128);
        });

        Schema::create('cs_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('serialized')->default(0)->nullable();
            $table->string('group')->index()->nullable();
            $table->string('name')->index();
            $table->string('nice_name')->index()->nullable();
            $table->text('value')->nullable();
        });

        Schema::create('cs_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->index()->default(1);
            $table->timestamps();
            $table->string('email')->unique();
        });

        Schema::create('cs_email_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->index()->default(1);
            $table->integer('sort_order')->default(0)->index();
            $table->timestamps();
            $table->string('name')->unique();
        });

        Schema::create('cs_emails_email_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('email_id')->index();
            $table->integer('email_group_id')->index();
            $table->timestamps();
        });

        Schema::create('cs_users_user_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('user_role_id')->index();
            $table->timestamps();
        });

        Schema::create('cs_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->index()->default(1);
            $table->integer('sort_order')->default(0)->index();
            $table->integer('user_id')->index();
            $table->timestamps();
            $table->timestamp('publish_at')->nullable();
            $table->string('subject', 128);
            $table->text('message');
        });

        Schema::create('cs_notifications_read', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('read')->index()->default(0);
            $table->integer('user_id')->index();
            $table->integer('notification_id')->index();
            $table->timestamps();
            $table->timestamp('seen_at')->nullable();
            $table->timestamp('read_at')->nullable();
        });

        Schema::create('cs_languages', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->index()->default(0);
            $table->integer('sort_order')->default(0)->index();
            $table->integer('image_id')->index()->nullable();
            $table->timestamps();
            $table->string('code', 5);
            $table->string('name', 32);
            $table->string('locale');
        });

        Schema::create('cs_articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('enabled')->index()->default(0);
            $table->bigInteger('parent_id')->index()->nullable();
            $table->integer('user_id')->index();
            $table->integer('sort_order')->default(0)->index();
            $table->integer('article_type_id')->index();
            $table->timestamps();
            $table->timestamp('publish_at')->nullable();
            $table->string('slug', 128)->nullable();
            $table->string('title')->nullable();
            $table->string('meta_description')->nullable();
        });

        Schema::create('cs_articles_description', function (Blueprint $table) {
            $table->integer('article_id')->index();
            $table->integer('language_id')->index();
            $table->text('content')->nullable();
        });

        Schema::create('cs_article_types', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('enabled')->index()->default(0);
            $table->integer('user_id')->index();
            $table->integer('sort_order')->default(0)->index();
            $table->timestamps();
            $table->string('name', 128)->nullable();
            $table->string('slug', 128)->nullable();
        });

        Schema::create('cs_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_order')->default(0)->index();
            $table->integer('user_id')->index();
            $table->float('filesize', 8, 2)->index()->default(0);
            $table->timestamps();
            $table->string('mime', 32)->nullable();
            $table->string('name')->nullable();
            $table->string('filename')->nullable();
            $table->string('generated_filename')->nullable();
        });

        Schema::create('cs_mail', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('resend')->index()->default(0);
            $table->boolean('enabled')->index()->default(1);
            $table->boolean('viewed')->default(0)->index();
            $table->integer('mailshot_id')->nullable()->index();
            $table->timestamps();
            $table->timestamp('sent_at')->nullable()->index();
            $table->string('to_email', 128)->index();
            $table->string('from_email', 128)->index()->nullable();
            $table->string('sender', 128)->index()->nullable();
            $table->string('subject', 255)->index()->nullable();
            $table->text('body_html')->nullable();
            $table->text('body_text')->nullable();
        });

        Schema::create('cs_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort_order')->default(0)->index();
            $table->integer('user_id')->index();
            $table->float('filesize', 8, 2)->index()->default(0);
            $table->timestamps();
            $table->string('mime', 32)->nullable();
            $table->string('name')->nullable();
            $table->string('filename')->nullable();
            $table->string('generated_filename')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('enabled')->default(0)->index()->after('id');
            $table->integer('user_role_id')->index()->default(1)->after('id');
            $table->string('username')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('cs_articles');
        Schema::dropIfExists('cs_articles_description');
        Schema::dropIfExists('cs_article_types');
        Schema::dropIfExists('cs_emails');
        Schema::dropIfExists('cs_email_groups');
        Schema::dropIfExists('cs_emails_email_groups');
        Schema::dropIfExists('cs_images');
        Schema::dropIfExists('cs_languages');
        Schema::dropIfExists('cs_mail');
        Schema::dropIfExists('cs_notifications');
        Schema::dropIfExists('cs_notifications_read');
        Schema::dropIfExists('cs_settings');
        Schema::dropIfExists('cs_user_roles');
        Schema::dropIfExists('cs_users_user_roles');
        Schema::dropIfExists('cs_uploads');

        Schema::table('users', function ($table) {
            $table->dropColumn('enabled');
            $table->dropColumn('user_role_id');
            $table->dropColumn('username');
        });
    }
}
