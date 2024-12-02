<x-base-layout>

    <div class="container">
        <h1>Division Types</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('division_types.create') }}" class="btn btn-primary">Add Division Type</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($divisionTypes as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            <a href="{{ route('division_types.edit', $type) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('division_types.destroy', $type) }}" method="POST" class="d-inline">
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

