<?php namespace DDDTodo\Commands;

class CreateTask extends Command
{

    /**
     * @var string
     */
    private $taskName;

    /**
     * Create a new command instance.
     *
     * @param string $taskName
     */
    public function __construct($taskName)
    {
        $this->taskName = $taskName;
    }

    /**
     * @return string
     */
    public function getTaskName()
    {
        return $this->taskName;
    }
}
