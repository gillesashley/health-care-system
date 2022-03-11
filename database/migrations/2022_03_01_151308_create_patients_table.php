<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->string('registration_date')->nullable();
            $table->string('referral')->nullable()->comment('1 = Yes, 2 = No');
            $table->string('referred_by')->nullable();
            $table->integer('patient_type')->nullable()->comment('1 = Inpatient, 2 = Outpatient');
            $table->string('title')->nullable()->comment('Mr. Mrs. Sir. Etc.');
            $table->string('name')->nullable()->fulltext()->comment('Full name of the patient');
            $table->date('dob')->nullable()->comment('Full name of the patient');
            $table->integer('age')->nullable()->comment('Full name of the patient');
            $table->string('gender')->nullable()->comment('M = Male, F = Female');
            $table->string('marital_status')->nullable()->comment('S = Single, D = Divorce, M = Married');
            $table->string('blood_group')->nullable();
            $table->string('email')->nullable()->comment('one email can be used for multiple patients from the same house');
            $table->string('phone')->nullable()->comment('one phone no can be used for multiple patients from the same house');
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable()->comment('student, farmer etc');
            $table->string('country')->nullable();

            $table->string('home_phone')->nullable();
            $table->text('home_address')->nullable();
            $table->string('father_name')->nullable();
            $table->text('father_address')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->text('mother_address')->nullable();
            $table->string('mother_phone')->nullable();

            // Next of Kin
            $table->tinyInteger('same_as_patient')->default(0)->comment('if same as patient, all addresses will be copied from patient to next of kin boxes');
            $table->string('next_of_kin_phone')->nullable();
            $table->string('next_of_kin_email')->nullable();
            $table->text('next_of_kin_address')->nullable();

            // Payment method
            $table->string('payment_method')->default(1)->comment('1 = Cash');

            $table->string('symptoms')->nullable();
            $table->string('image')->nullable();

            $table->foreignIdFor(User::class)->nullable()->constrained()->comment('the user_id is the doctor id in this table');
            $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
