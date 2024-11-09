@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <h3>Edit the post</h3>
        </div>
    <div class="container mt-5">
        <div class="row">
        <form action="{{ route('tasks.update', $task->id)}}" method="post">
        @csrf
        @method('PUT')
            <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" id="description"required>{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" class="form-control" id="type" value="{{ $task->type }}" required>
        </div>
        <div class="form-group">
            <label for="duedate">Due Date</label>
            <input type="date" name="duedate" class="form-control" id="duedate"value="{{ $task->duedate }}"required>
        </div>
        <div class="form-group">
            <label for="user_id">Assign Task to User</label>
            <select name="user_id" id="user_id" class="form-control" required>
            <option disabled>Select a user</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected': '' }}>
            {{ $user->name }}
    </option>
        @endforeach
</select>
</div>
<br>
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
</div>
</div>
@endsection