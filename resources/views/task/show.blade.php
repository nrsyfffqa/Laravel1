@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
<h3 class="card-title">Task</h3>

</div>
<div class="container mt-5">
<div class="row">
<div>
<h5>{{ $task->title }}</h5>
</div>

<div>
<p>{{ $task->description}}</p>
</div>

<div>
<p>{{ $task->type}}</p>
</div>

<div>
<p>{{ $task->duedate}}</p>
</div>

</div>
</div>
@endsection