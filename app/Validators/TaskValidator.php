<?php namespace DDDTodo\Validators;

use DDDTodo\Commands\Command;
use DDDTodo\Commands\CreateTask;
use Illuminate\Support\Str;

class TaskValidator implements Validator
{
    /**
     * @param Command|CreateTask $command
     *
     * @return bool
     */
    public function validate(Command $command)
    {
        return Str::length($command->getTaskName()) < 50;
    }
}
