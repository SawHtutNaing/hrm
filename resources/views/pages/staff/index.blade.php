<x-base-layout>

    <h1>Staff List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staff as $staffMember)
                <tr>
                    <td>{{ $staffMember->first_name }}</td>
                    <td>{{ $staffMember->last_name }}</td>
                    <td>{{ $staffMember->email }}</td>
                    <td>{{ $staffMember->status }}</td>
                    <td>
                        <a href="{{ route('staffs.edit', $staffMember->id) }}">Edit</a>
                        <form action="{{ route('staffs.destroy', $staffMember->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('staffs.create') }}">Add Staff</a>
</x-base-layout>
