<div class="card card-primary">
    <h5 class="card-header">
        New Todo
    </h5>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('todos.store') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Task name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter task name">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
