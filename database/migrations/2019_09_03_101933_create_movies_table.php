<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(); // tên bộ phim
            $table->string('slug')->nullable(); // đường dẫn tĩnh
            $table->string('info')->nullable(); // thông tin phim
            $table->string('view')->nullable(); // lượt view
            $table->string('production_year')->nullable();//năm sản xuất
            $table->text('show_times')->nullable();// lịch chiếu
            $table->longText('content')->nullable();//nội dung
            $table->timestamp('air_date'); // ngày công chiếu
            $table->integer('episodes')->nullable(); // Số tập
            $table->integer('movie_duration')->nullable();// độ dài - thời lượng bộ phim
            $table->string('directors')->nullable(); // đạo diễn
            $table->string('actor')->nullable(); // diễn viên
            $table->integer('cate_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('image')->nullable();
            $table->integer('user_id');
            $table->text('meta_title')->nullable();
            $table->longText('meta_description');
            $table->text('meta_keyword')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
