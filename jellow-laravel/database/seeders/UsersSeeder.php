<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($res->body());

        echo "Importing users ...";

        $users_dump = [];
        foreach ($users as $key => $user) {
            array_push($users_dump, [
                User::NAME => $user->name,
                User::EMAIL => $user->email,
                User::USERNAME => $user->username,
                User::WEBSITE => $user->website,
                User::IMAGE => null
            ]);
        }

        DB::table(User::TABLE)->insert($users_dump);

        echo "\nUsers imported.\n";
    }
}
