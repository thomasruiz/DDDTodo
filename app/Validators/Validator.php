<?php namespace DDDTodo\Validators;

use DDDTodo\Commands\Command;

interface Validator
{
    /**
     * @param Command $command
     *
     * @return mixed
     */
    public function validate(Command $command);
}
