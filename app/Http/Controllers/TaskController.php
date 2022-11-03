<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private TaskRepositoryInterface $taskRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        TaskRepositoryInterface $taskRepository,
        UserRepositoryInterface $userRepository,
        AdminRepositoryInterface $adminRepository
    ) 
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
        $this->adminRepository = $adminRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskRepository->paginate();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepository->all();
        $admins = $this->adminRepository->all();
        return view('tasks.create', compact('admins', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $this->taskRepository->create($request->validated());
        return redirect()->route('tasks.index');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        $users = $this->userRepository->statistics();
        return view('tasks.statistics', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
