<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceidForReceivedtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->foreignId("sale_invoice_id")->nullable()->after("admin_id");
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId("purces_invoice_id")->nullable()->after("admin_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropColumn(["sale_invoice_id"]);
        });
        Schema::table('Payments', function (Blueprint $table) {
            $table->dropColumn(["receive_invoice_id"]);
        });
    }
}
