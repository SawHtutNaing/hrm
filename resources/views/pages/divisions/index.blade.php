<x-base-layout>

    <div class="container">
        <h1>Divisions</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('divisions.create') }}" class="btn btn-primary">Add Division</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Division Type</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($divisions as $division)
                    <tr>
                        <td>{{ $division->id }}</td>
                        <td>{{ $division->name }}</td>
                        <td>{{ $division->divisionType->name }}</td>
                        <td>
                            <a href="{{ route('divisions.edit', $division) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('divisions.destroy', $division) }}" method="POST" class="d-inline">
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

