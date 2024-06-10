<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            ['code' => 'JK-45', 'title' => 'Harry Potter', 'author' => 'J.K Rowling', 'stock' => 1],
            ['code' => 'SHR-1', 'title' => 'A Study in Scarlet', 'author' => 'Arthur Conan Doyle', 'stock' => 1],
            ['code' => 'TW-11', 'title' => 'Twilight', 'author' => 'Stephenie Meyer', 'stock' => 1],
            ['code' => 'HOB-83', 'title' => 'The Hobbit, or There and Back Again', 'author' => 'J.R.R. Tolkien', 'stock' => 1],
            ['code' => 'NRN-7', 'title' => 'The Lion, the Witch and the Wardrobe', 'author' => 'C.S. Lewis', 'stock' => 1],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
