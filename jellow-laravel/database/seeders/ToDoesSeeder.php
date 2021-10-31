<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class ToDoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res = Http::get('https://jsonplaceholder.typicode.com/todos');
        $users = json_decode($res->body());

        echo "Importing todoes ...";

        $todoes_dump = [];
        foreach ($users as $key => $user) {
            array_push($todoes_dump, [
                Todo::TITLE => $user->title,
                Todo::COMPLETED => $user->completed,
                Todo::USER_ID => $user->userId,
            ]);
        }

        DB::table(Todo::TABLE)->insert($todoes_dump);

        echo "\nTodoes imported.\n";
    }
}
