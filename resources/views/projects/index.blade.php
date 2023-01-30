@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5">
        <div class="h6 text-dark">
            <a class=" text-decoration-none" href="/projects">Projects</a>
        </div>

        <div>
            <a href="/projects/create" class="btn btn-primary px-4" role="button">New Project</a>
        </div>
    </header>


    <section>
        <div class="row">
        @forelse($projects as $project)
            <div class="col-4 mb-4">
                <div class="card" style="height: 230px;">
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
                                <a href="/projects/{{$project->id}}" class="text-decoration-none"> {{ $project->title }} </a>
                            </h5>

                            <div class="card-text mt-4">
                                {{Str::limit($project->description, 150)}}
                            </div>
                        </div>
                    </div>
                    @include('projects.footer')
                </div>
            </div>
        @empty
            <div class="m-auto align-content-center text-center">
                <p>The Panel Is Empty</p>
                <div class="mt-5">
                    <a href="/projects/create" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">Create New Project</a>
                </div>
            </div>
        @endforelse
        </div>
    </section>
@endsection
