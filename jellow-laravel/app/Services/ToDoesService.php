<?php

namespace App\Services;

use App\Models\Todo;

class ToDoesService
{
    /**
     * @param int $userId
     * @param int $todoId
     * @return Todo
     */
    public function toDoComplete(int $userId, int $todoId): Todo
    {
        $todo = Todo::where(Todo::USER_ID, $userId)->where(Todo::ID, $todoId)->firstOrFail();
        $todo->completed = !$todo->completed;
        $todo->save();

        return $todo;
    }
}
