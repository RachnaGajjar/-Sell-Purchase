<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateSearchBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'CREATE VIEW least_book_price AS
                SELECT
                    `user_books`.`book_id`,
                    MIN(`user_books`.`selling_price`) AS selling_price
                FROM `user_books`
                WHERE `user_books`.`sold` = 0
                GROUP BY `user_books`.`book_id`'
            );

        DB::statement(
            'CREATE VIEW search_books AS
                SELECT
                    books.*,
                    least_book_price.selling_price
                FROM books
                RIGHT JOIN least_book_price
                ON least_book_price.book_id = books.id'
        );
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW search_books');
        DB::statement('DROP VIEW least_book_price');
    }
}
