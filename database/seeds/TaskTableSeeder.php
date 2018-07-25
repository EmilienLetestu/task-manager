<?php
/**
 * Created by PhpStorm.
 * User: emilien
 * Date: 25/07/2018
 * Time: 20:55
 */
use Illuminate\Database\Seeder;
use App\Task;

class TaskTableSeeder extends Seeder
{
    public function run()
    {
       for($i = 1; $i < 5; $i++){

           $task = new Task();
           $task->title       = 'Tache ' . $i;
           $task->description = 'Lorem ipsum tascum bla bla bla...';
           $task->dead_line   = today();
           $task->done        = false;
           $task->save();
       }
    }
}