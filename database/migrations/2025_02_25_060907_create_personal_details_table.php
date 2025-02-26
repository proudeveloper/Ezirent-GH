<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('application_id')->default('00000000000');
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('whatsapp_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('level_edu')->nullable();
            $table->date('dob')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('current_location')->nullable();
            $table->string('how_heard')->nullable();
            $table->string('emer_f_name')->nullable();
            $table->string('emer_l_name')->nullable();
            $table->string('emer_relationship')->nullable();
            $table->string('emer_relationship_other')->nullable();
            $table->string('emer_phone')->nullable();
            $table->string('emer_current_location')->nullable();
            $table->string('employ_status')->nullable();
            $table->double('net_income', 10, 2)->nullable();
            $table->string('outstanding_dept')->nullable();
            $table->string('current_accomodate')->nullable();
            $table->string('area_interest')->nullable();
            $table->double('monthly_budget')->nullable();
            $table->date('move_in_date')->nullable();
            $table->string('type_of_property')->nullable();
            $table->integer('request_month')->nullable();
            $table->integer('months_payback')->nullable();
            $table->string('landlord_name')->nullable();
            $table->string('landlord_contact')->nullable();
            $table->string('gh_card_img')->nullable();
            $table->string('rent_unit_detail')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('proof_of_doc')->nullable();
            $table->string('id_card')->nullable();
            $table->tinyInteger('rent_status')->default(6)->comment('1=INCOMPLETE, 2=Pending, 3=Review, 4=Approved, 5=Delivered, 6=New Application, 0=Declined');
            $table->string('selfie')->nullable();
            $table->boolean('payed_app')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
