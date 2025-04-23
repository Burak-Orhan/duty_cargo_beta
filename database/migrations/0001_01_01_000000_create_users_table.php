<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("country");
            $table->string("city");
            $table->string("state");
            $table->string("post_date");
            $table->timestamps();
        });

        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");

            $table->date("purchase_date");            // $table->foreignId("cargos_id")->constrained("cargos")->onDelete("cascade");
            $table->timestamps();
        });

        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code')->unique()->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId("company_id")->constrained("company")->onDelete("cascade");
            $table->timestamps();
        });

        // cargos_id'yi eklemek sonrandan ihtiyaç doğurduğu için ufak düzenlemeler ile oluşturduk
        // eğerki burayı kaldırırsak sql sorgularında istediğimiz sonuca ulaşamıyoruz 
        // ondan dolayı okul projesi bitene kadar bu şekilde kullanılacaktır
        Schema::table('customer', function (Blueprint $table) {
            $table->foreignId("cargos_id")->nullable()->constrained("cargos")->onDelete("cascade");
        });

        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string("country")->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_information');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('company');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
