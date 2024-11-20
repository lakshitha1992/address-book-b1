<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Creating the 'users' table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name field
            $table->string('email')->unique(); // Unique email
            $table->timestamp('email_verified_at')->nullable(); // Nullable email verification timestamp
            $table->string('password'); // Password field
            $table->rememberToken(); // Remember me token
            $table->timestamps(); // Created and updated timestamps
        });

        // Creating the 'password_reset_tokens' table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary key based on email
            $table->string('token'); // Token for password reset
            $table->timestamp('created_at')->nullable(); // Timestamp when token is created
        });

        // Creating the 'sessions' table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Session ID as primary key
            $table->foreignId('user_id')->nullable()->index(); // Foreign key for user_id (nullable)
            $table->string('ip_address', 45)->nullable(); // Nullable IP address
            $table->text('user_agent')->nullable(); // Nullable user agent
            $table->longText('payload'); // Payload (serialized session data)
            $table->integer('last_activity')->index(); // Last activity timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Dropping the 'users', 'password_reset_tokens', and 'sessions' tables
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};