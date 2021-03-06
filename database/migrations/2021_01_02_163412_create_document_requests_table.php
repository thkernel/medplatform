<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique()->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('title')->nullable();
            $table->string('recipient_civility');
            $table->string('recipient_function');
            $table->string('request_location');
            $table->text('content')->nullable();
            $table->string('status')->nullable();

            $table->integer('structure_category_id')->nullable()->unsigned();
            $table->foreign('structure_category_id')->references('id')->on('structure_categories')->onDelete('cascade');

            $table->string('structure_name')->nullable();

            $table->integer('document_type_id')->unsigned();
            $table->foreign('document_type_id')->references('id')->on('document_types')->onDelete('cascade');

            $table->bigInteger('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctor_profiles')->onDelete('cascade');
            /*
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            */
            
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_requests');
    }
}
