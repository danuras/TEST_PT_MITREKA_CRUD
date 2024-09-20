<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'User Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        $budi = User::factory()->create([
            'name' => 'budi',
            'email' => 'budi@example.com',
            'role' => 'basic',
        ]);


        $books = Book::factory(10)->create();

        // data peminjaman sudah disetujui
        for ($i = 0; $i < 5; $i++) {
            Borrowing::factory()->create([
                'id_book' => $books[mt_rand(0, 10)]->id,
                'id_borrower' => $budi->id,
                'id_admin' => $admin->id,
            ]);
        }

        // data peminjaman belum disetujui
        for ($i = 0; $i < 5; $i++) {
            Borrowing::factory()->create([
                'id_book' => $books[mt_rand(0, 10)]->id,
                'id_borrower' => $budi->id,
                'id_admin' => null,
            ]);
        }
    }
}
