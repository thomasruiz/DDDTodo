<?php namespace DDDTodo\Http\Controllers;

use DDDTodo\Commands\CreateTask;
use DDDTodo\Commands\DeleteTask;
use DDDTodo\Commands\FulfillTask;
use DDDTodo\Entities\Task;
use DDDTodo\Http\Requests;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param EntityManager $entityManager
     *
     * @return Response
     */
    public function index(EntityManager $entityManager)
    {
        $repo = $entityManager->getRepository('DDDTodo\Entities\Task');

        return view('tasks.index', [ 'tasks' => $repo->findAll() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->dispatch(new CreateTask($request->input('name')));

        return redirect(route('tasks.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update($id)
    {
        $this->dispatch(new FulfillTask($id));

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteTask($id));

        return redirect(route('tasks.index'));
    }
}
