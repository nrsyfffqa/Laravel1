@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="row">
<h3>Add a post</h3>
</div>

<div>
    <form action="{{ route('task.store') }}" method="post">
    @csrf
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" required>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" name="description" class="form-control" id="description"
    required></textarea>
</div>

<div class="form-group">
    <label for="type">Type</label>
    <input type="text" name="type" class="form-control" id="type" required>
</div>

<div class="form-group">
    <label for="duedate">Due Date</label>
    <input type="date" name="duedate" class="form-control" id="duedate"
    required>
</div>

<div class="form-group">
    <label for="user_id">Assign Task to User</label>
    <select name="user_id" id="user_id" class="form-control" required>
    <option value="" disabled selected>Select a user</option>
    @foreach ($users as $user)
    <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>
</div>

<br>
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>

</div>
</div>
@endsection