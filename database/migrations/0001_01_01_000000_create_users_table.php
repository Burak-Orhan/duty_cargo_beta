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
        // Users Tablosu
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Password Reset Tokens Tablosu
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions Tablosu
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Companies Tablosu
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('post_date');
            $table->timestamps();
        });

        // Cargos Tablosu
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_code')->unique()->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->integer("status")->default("4");
            $table->timestamps();
        });

        // Customers Tablosu
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('cargo_id')->nullable()->constrained('cargos')->onDelete('cascade');
            $table->date('purchase_date');
            $table->timestamps();
        });

        // User Information Tablosu
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        // Add user_information_id to customers table
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_information_id')->nullable();
            $table->foreign('user_information_id')->references('id')->on('user_information')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['user_information_id']);
            $table->dropColumn('user_information_id');
        });

        Schema::dropIfExists('user_information');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
