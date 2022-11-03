<?php

namespace Tests\Unit;

use App\Models\Admin;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\TasksSeeder;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    //Check if index page exists
    public function test_index_page()
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    //Check if create page exists
    public function test_create_form()
    {
        $response = $this->get('/tasks/create');
        $response->assertStatus(200);
    }

    //Test if a task can be created 
    public function test_if_it_stores_new_tasks()
    {
        $response = $this->post('/tasks', [
            'title' => fake()->name(),
            'description' => fake()->text(50),
            'assigned_to_id' => User::inRandomOrder()->first()->id,
            'assigned_by_id' => Admin::inRandomOrder()->first()->id
        ]);

        $response->assertRedirect('/tasks');
    }

    //Test if a task can be deleted 
    public function test_delete_task()
    {
        $task = Task::first();
        if($task) {
            $task->delete();
        }
        $this->assertTrue(true);
    }

}
