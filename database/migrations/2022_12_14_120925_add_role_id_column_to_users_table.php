<?php
//relasi user/peminjam dengan role/petugas/admin
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           // $table->integer('role_id')->nullable();
           $table->unsignedBigInteger('role_id');
           $table->foreign('role_id')->references('id')->on('roles');       
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           // $table->dropColumn('role_id')->nullable();
            //Schema::disableForeignKeyConstraints();
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');       
         });
    }
};
