<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\BasicIntake;
use App\Models\User;
use App\Models\TaskAssigned;
use Auth;
class Index extends Component
{
    public $taskForm;
    public $task_id;
    public function render()
    {
        $basic_intakes = BasicIntake::all();
        $employees = User::role('employee')->select("id", "name")->get();
        if(in_array('employee',Auth::user()->roles->pluck('name')->toArray()))
        {
            $tasks = TaskAssigned::where('employee_id',Auth::id())->orderBy('task_deadline', 'ASC')->get();
        }else{
            $tasks = TaskAssigned::orderBy('task_deadline', 'ASC')->get();
        }
        return view('livewire.task.index', compact('basic_intakes', 'employees', 'tasks'));
    }

    public function editTask($id)
    {
        $this->task_id = $id;
        $this->taskForm = TaskAssigned::where('id', $id)->first()?->toArray();
        $this->dispatchBrowserEvent('editTask');
    }


    public function addTask()
    {
        $this->task_id = null;
        $this->taskForm = null;
        $this->dispatchBrowserEvent('addTask');
    }

    public function submitTaskForm()
    {
        $data = $this->taskForm;
        $id = $this->task_id;
        if (empty($id)) {
            if (!isset($data['assigned_calender'])) {
                $data['assigned_calender'] = 1;
            };
            TaskAssigned::create($data);
        } else {
            unset($data['created_at']);
            unset($data['updated_at']);
            TaskAssigned::where('id', $id)->update($data);
        }

        $this->dispatchBrowserEvent('saveTask');
    }

    public function deleteTask($id)
    {
        TaskAssigned::where('id', $id)->delete();
        $this->emitSelf('$refresh');

    }

    public function changeStatus($value,$id)
    {
        TaskAssigned::where('id', $id)->update(['task_status'=>$value]);

    }
}
