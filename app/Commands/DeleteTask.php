<?php namespace DDDTodo\Commands;

class DeleteTask extends Command
{

    /**
     * @var int
     */
    private $id;

    /**
     * Create a new command instance.
     *
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
