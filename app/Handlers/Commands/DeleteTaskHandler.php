<?php namespace DDDTodo\Handlers\Commands;


use DDDTodo\Commands\DeleteTask;
use Doctrine\ORM\EntityManager;

class DeleteTaskHandler
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
     * @param DeleteTask $command
     *
     * @return void
     */
    public function handle(DeleteTask $command)
    {
        $task = $this->entityManager->getPartialReference('DDDTodo\Entities\Task', $command->getId());

        $this->entityManager->remove($task);
        $this->entityManager->flush();
    }
}
