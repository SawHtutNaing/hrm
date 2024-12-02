<x-base-layout>

    <div class="container">
        <h1>Departments</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('departments.create') }}" class="btn btn-primary">Add Department</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Division</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->division->name }}</td>
                        <td>
                            <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('departments.destroy', $department) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-base-layout>

