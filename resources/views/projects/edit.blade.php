@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-5">
                <h3 class="text-center pb-5 ">
                    Edit Project
                </h3>

                <form action="/projects/{{$project->id}}" method="POST">
                    @method('PATCH')
                    @include('projects.form')

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end ">Edit</button>
                        <a href="/projects" class="btn btn-light float-end mx-2">Cancel</a>
                    </div>
                </form>
              </div>
        </div>
    </div>
@endsection
