@csrf
<div class="mb-3">
    <label for="title" class="form-label">Project Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$project->title ?? ''}}">
    @error('title')
        <div class="text-danger">
            <small>{{$message}}</small>
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Project Body</label>
    <textarea  class="form-control" id="description" name="description">{{$project->description ?? ''}}</textarea>
    @error('description')
    <div class="text-danger">
        <small>{{$message}}</small>
    </div>
    @enderror
</div>
