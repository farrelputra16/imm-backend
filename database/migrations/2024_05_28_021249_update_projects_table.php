<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('img')->nullable()->after('id');
            $table->string('jenis_dana')->nullable()->after('jumlah_pendanaan');
            $table->decimal('dana_lain', 15, 2)->nullable()->after('jenis_dana');
            $table->text('deskripsi_pelanggan')->nullable()->after('dana_lain');
            $table->string('provinsi')->after('end_date');
            $table->string('kota')->after('provinsi');
            $table->string('gmaps')->nullable()->after('kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('img');
            $table->dropColumn('jenis_dana');
            $table->dropColumn('dana_lain');
            $table->dropColumn('deskripsi_pelanggan');
            $table->dropColumn('provinsi');
            $table->dropColumn('kota');
            $table->dropColumn('gmaps');
        });
    }
}

