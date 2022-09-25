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
			$table->string('comp_name');
			$table->longText('corrigendum');
			$table->string('proc_method');
			$table->string('work_name');
			$table->string('address');
			$table->string('ref_no');
			$table->string('publish_date');
			$table->string('last_date');
			$table->string('crdt');
			$table->string('pre_t_meeting');
			$table->string('t_open_date');
			$table->string('supply_location');
			$table->string('schedule_submission');
			$table->string('fund_source');
			$table->string('price_schedule');
			$table->string('security_amount');
			$table->string('req_time');
			$table->longText('desc');
			$table->string('package_details');
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
