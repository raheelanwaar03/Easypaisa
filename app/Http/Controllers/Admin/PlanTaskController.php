<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Plans;
use App\Models\admin\PlanTasks;
use Illuminate\Http\Request;

class PlanTaskController extends Controller
{
    public function addTask()
    {
        $plans = Plans::get();
        return view('admin.plans.task.add', compact('plans'));
    }

    public function allTask()
    {
        $tasks = PlanTasks::get();
        return view('admin.plans.task.allTasks', compact('tasks'));
    }

    public function deleteTask($id)
    {
        $task = PlanTasks::find($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task Deleted');
    }

    public function storeTask(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'plan' => 'required',
            'image' => 'required',
            'level' => 'required',
            'link' => 'required',
            'price' => 'required'
        ]);

        $image = $validated['image'];
        $imageName = rand(1111111, 9999999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('Task/'), $imageName);

        $task = new PlanTasks();
        $task->name = $validated['name'];
        $task->link = $validated['link'];
        $task->price = $validated['price'];
        $task->level = $validated['level'];
        $task->plan = $validated['plan'];
        $task->image = $imageName;
        $task->save();
        return redirect()->back()->with('success', 'Plan ' . $task->name . ' added successfully');
    }
}
