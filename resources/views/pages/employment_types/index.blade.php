<x-base-layout>

    <div class="container">
        <h1>Employment Types</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('employment_types.create') }}" class="btn btn-primary">Add Employment Type</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employmentTypes as $employmentType)
                    <tr>
                        <td>{{ $employmentType->id }}</td>
                        <td>{{ $employmentType->name }}</td>
                        <td>
                            <a href="{{ route('employment_types.edit', $employmentType) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employment_types.destroy', $employmentType) }}" method="POST" class="d-inline">
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

