    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddUserIdToPeopleTable extends Migration
    {
        public function up()
        {
            Schema::table('people', function (Blueprint $table) {
                // Cek apakah kolom user_id sudah ada sebelum menambahkannya
                if (!Schema::hasColumn('people', 'user_id')) {
                    $table->unsignedBigInteger('user_id')->nullable()->after('id');

                    // Tambahkan foreign key constraint
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                }
            });
        }

        public function down()
        {
            Schema::table('people', function (Blueprint $table) {
                // Hapus foreign key dan kolom user_id jika ada
                if (Schema::hasColumn('people', 'user_id')) {
                    $table->dropForeign(['user_id']);
                    $table->dropColumn('user_id');
                }
            });
        }
    }

