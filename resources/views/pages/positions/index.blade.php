<x-base-layout>
   
    <div class="container">
        <h1>Positions</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('positions.create') }}" class="btn btn-primary">Add Position</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>PayScale</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->name }}</td>
                        <td>{{ $position->payscale->name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('positions.edit', $position) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('positions.destroy', $position) }}" method="POST" class="d-inline">
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

