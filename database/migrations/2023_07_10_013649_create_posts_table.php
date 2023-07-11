<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create( 'posts', function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger( 'user_id' );
            $table->unsignedBigInteger( 'category_id' );
            $table->string( 'title' );
            $table->text( 'content' );
            $table->string( 'postImg' );
            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();

            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' )
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists( 'posts' );
    }
};
