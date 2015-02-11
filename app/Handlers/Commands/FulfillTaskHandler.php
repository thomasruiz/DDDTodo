<?php namespace DDDTodo\Handlers\Commands;

use DDDTodo\Commands\FulfillTask;
use Doctrine\ORM\EntityManager;

class FulfillTaskHandler
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Create the command handler.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle the command.
     *
     * @param FulfillTask $command
     *
     * @return void
     */
    public function handle(FulfillTask $command)
    {
        $task = $this->entityManager->find('DDDTodo\Entities\Task', $command->getId());

        $task->fulfill();

        $this->entityManager->flush();
    }
}
