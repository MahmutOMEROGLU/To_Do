@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5">
        <div class="h6 text-dark">
            <a href="/projects" class="text-decoration-none">Project / {{$project->title}}</a>
        </div>

        <div>
            <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button">Edit Project</a>
        </div>
    </header>

    <section class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="status">
                        @switch($project->status)
                            @case(1)
                                <span class="text-success">Completed</span>
                                @break
                            @case(2)
                                <span class="text-danger">Cancelled</span>
                                @break
                            @default
                                <span class="text-warning">In Processing</span>
                        @endswitch
                        <h5 class="card-title my-2">
                            <a href="/projects/{{$project->id}}" style="text-decoration: none">{{ $project->title }}</a>
                        </h5>

                        <div class="card-text mt-4">
                            {{$project->description}}
                        </div>
                    </div>
                </div>
                @include('projects.footer')
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <h5>Change Project Status</h5>
                    <form action="/projects/{{$project->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select class="form-select"  name="status" onchange="this.form.submit()">
                            <option value="0" {{($project->status == 0) ? 'selected' : ""}}>In Progress</option>
                            <option value="1" {{($project->status == 1) ? 'selected' : ""}}>Completed</option>
                            <option value="2" {{($project->status == 2) ? 'selected' : ""}}>Cancelled</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            @foreach($project->tasks as $task)
                <div class="card d-flex flex-row my-2 p-2 rounded align-items-center">
                    <div class="mx-2">
                        {{$task->body}}
                    </div>

                    <div class="ms-auto py-2">
                        <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="done" class="mx-2" {{$task->done ? 'checked' : ''}}  onchange="this.form.submit()">
                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                        <form action="{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"> Remove </button>
                        </form>
                    </div>
                </div>
            @endforeach



            <div class="card mt-4 rounded">
                <form action="/projects/{{$project->id}}/tasks" method="POST" class="d-flex p-2">
                    @csrf
                    <input type="text" name="body" class="form-control p-2 ms-2 border-0" placeholder="Add New Task">
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </section>
@endsection
