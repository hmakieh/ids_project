<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->primary(['tag_id', 'post_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
};