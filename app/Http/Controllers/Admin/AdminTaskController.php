<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Task;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function add()
    {
        return view('admin.task.add');
    }

    public function all()
    {
        $tasks = Task::get();
        return view('admin.task.all', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $image = $validated['image'];
        $imageName = rand(1111111, 9999999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/'), $imageName);

        $task = new Task();
        $task->title = $validated['title'];
        $task->link = $validated['link'];
        $task->description = $validated['description'];
        $task->image = $imageName;
        $task->save();
        return redirect()->back()->with('success', 'Task added successfully');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task Deleted');
    }
}
