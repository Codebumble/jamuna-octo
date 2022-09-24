<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('codebumble_tender_list');
		Schema::create('codebumble_tender_list', function (Blueprint $table) {
			$table->id();
			$table->string('package');
			$table->string('company');
			$table->string('sector');
			$table->string('contact_person');
			$table->string('contact_no');
			$table->string('email');
			$table->string('designation');
			$table->string('department');
			$table->string('country');
			$table->string('currency');
			$table->string('address');
			$table->string('cp_link');
			$table->string('updated_at')->nullable();
			$table->string('created_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('codebumble_tender_list');
	}
};
