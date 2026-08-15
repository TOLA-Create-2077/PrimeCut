<?php

public function up(): void
{
    Schema::create('site_settings', function (Blueprint $table) {
        $table->id();
        $table->string('key', 100)->unique();
        $table->text('valu')->nullable();
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('site_settings');
}