<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserApiTableSeeder extends Seeder
{
    /**
     * Seeder to insert test data into the 'userapi' table.
     *
     * This seeder generates 10 records for the 'userapi' table. Each record contains a unique 'uid' 
     * generated with Str::uuid(), and includes fields like first name, last name, email, password, 
     * address, phone numbers, postal code, birth date, and gender. It uses Laravel's Faker for 
     * generating random data where applicable.
     *
     * @package Database\Seeders
     */
    public function run()
    {
        DB::table('userapi')->insert([
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password123'),
                'address' => '123 Main St',
                'phone' => '1234567890',
                'phone_2' => '0987654321',
                'postal_code' => '12345',
                'birth_date' => '1990-01-01',
                'gender' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password123'),
                'address' => '456 Maple Ave',
                'phone' => '2345678901',
                'phone_2' => NULL,
                'postal_code' => '67890',
                'birth_date' => '1985-05-15',
                'gender' => 'F',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'Michael',
                'last_name' => 'Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => bcrypt('password123'),
                'address' => '789 Oak St',
                'phone' => '3456789012',
                'phone_2' => NULL,
                'postal_code' => '11223',
                'birth_date' => '1992-07-21',
                'gender' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'Emily',
                'last_name' => 'Davis',
                'email' => 'emily.davis@example.com',
                'password' => bcrypt('password123'),
                'address' => '321 Cedar Blvd',
                'phone' => '4567890123',
                'phone_2' => NULL,
                'postal_code' => '33445',
                'birth_date' => '1993-11-10',
                'gender' => 'F',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'David',
                'last_name' => 'Lee',
                'email' => 'david.lee@example.com',
                'password' => bcrypt('password123'),
                'address' => '654 Pine St',
                'phone' => '5678901234',
                'phone_2' => '7654321098',
                'postal_code' => '55667',
                'birth_date' => '1988-04-10',
                'gender' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'Sophia',
                'last_name' => 'Martinez',
                'email' => 'sophia.martinez@example.com',
                'password' => bcrypt('password123'),
                'address' => '987 Birch St',
                'phone' => '6789012345',
                'phone_2' => NULL,
                'postal_code' => '77889',
                'birth_date' => '1991-02-14',
                'gender' => 'F',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'James',
                'last_name' => 'Wilson',
                'email' => 'james.wilson@example.com',
                'password' => bcrypt('password123'),
                'address' => '321 Oak Blvd',
                'phone' => '7890123456',
                'phone_2' => '8765432109',
                'postal_code' => '88990',
                'birth_date' => '1995-09-20',
                'gender' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'Olivia',
                'last_name' => 'Taylor',
                'email' => 'olivia.taylor@example.com',
                'password' => bcrypt('password123'),
                'address' => '123 Elm St',
                'phone' => '8901234567',
                'phone_2' => NULL,
                'postal_code' => '99001',
                'birth_date' => '1990-12-25',
                'gender' => 'F',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'William',
                'last_name' => 'Brown',
                'email' => 'william.brown@example.com',
                'password' => bcrypt('password123'),
                'address' => '654 Maple Blvd',
                'phone' => '9012345678',
                'phone_2' => '2345678901',
                'postal_code' => '44332',
                'birth_date' => '1996-03-30',
                'gender' => 'M',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uid' => (string) Str::uuid(),
                'first_name' => 'Charlotte',
                'last_name' => 'Moore',
                'email' => 'charlotte.moore@example.com',
                'password' => bcrypt('password123'),
                'address' => '432 Pine Ave',
                'phone' => '1023456789',
                'phone_2' => NULL,
                'postal_code' => '33444',
                'birth_date' => '1992-08-17',
                'gender' => 'F',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
