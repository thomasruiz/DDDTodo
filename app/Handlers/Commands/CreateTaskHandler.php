<?php namespace DDDTodo\Handlers\Commands;

use DDDTodo\Commands\CreateTask;
use DDDTodo\Entities\Task;
use DDDTodo\Validators\TaskValidator;
use Doctrine\ORM\EntityManager;

class CreateTaskHandler
{

    /**
     * @var TaskValidator
     */
    private $validator;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * Create the command handler.
     *
     * @param TaskValidator $validator
     * @param EntityManager $entityManager
     */
    public function __construct(TaskValidator $validator, EntityManager $entityManager)
    {
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    /**
     * Handle the command.
     *
     * @param CreateTask $command
     *
     * @throws \Exception
     */
    public function handle(CreateTask $command)
    {
        if (!$this->validator->validate($command)) {
            throw new \Exception('Command not validated');
        }

        $task = new Task();
        $task->setName($command->getTaskName());

        $this->entityManager->persist($task);
        $this->entityManager->flush();
    }
}
