<div class="card card-primary">
    <h5 class="card-header">All Todos</h5>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 20%">Task name</th>
                    <th style="width: 20%">Status</th>
                    <th style="width: 20%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($todos as $todo)
                    <tr>
                        <td>{{ $todo->name }}</td>
                        @if ($todo->completed == false)
                        <td><div class="badge badge-info">pending</div></td>
                        @else
                        <td><div class="badge badge-success">completed</div></td>
                        @endif
                        <td class="project-actions">
                            <form style="display: inline-block" action="{{ route('todos.update', $todo) }}" method="post">
                                @csrf
                                @method('PATCH')
                                @if ($todo->completed == false)
                                <button class="btn btn-outline-info btn-sm" type="submit">✔</button>
                                @else
                                <button class="btn btn-outline-success btn-sm" type="submit">✔</button>
                                @endif
                            </form>
                            <a class="btn btn-danger btn-sm" href="#" data-id='{{$todo->id}}' data-toggle="modal" data-target="#modal-danger">
                                <i class="fas fa-trash">
                                </i>
                            </a>

                            <div class="modal fade" id="modal-danger">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-header">
                                                <h4 class="modal-title">Confirm</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure want to delete?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-outline-light">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">No records found!</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
