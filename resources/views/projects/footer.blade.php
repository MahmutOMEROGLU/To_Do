<div class="card-footer ">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="ms-2">
                {{$project->created_at->diffForHumans()}}
            </div>
        </div>

        <div class="d-flex align-items-center ms-4">
            <img src="/images/list-check.svg" alt="">
            <div class="ms-2">
                {{count($project->tasks)}}
            </div>
        </div>

        <div class="d-flex align-items-center ms-auto">
            <form action="projects/{{$project->id}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm"> Remove </button>
            </form>
        </div>
    </div>
</div>
