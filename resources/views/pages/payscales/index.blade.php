<x-base-layout>
    <div class="container">
        <h1>PayScales</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <a href="{{ route('payscales.create') }}" class="btn btn-primary">Add PayScale</a>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payscales as $payscale)
                    <tr>
                        <td>{{ $payscale->id }}</td>
                        <td>{{ $payscale->name }}</td>
                        <td>{{ $payscale->amount }}</td>
                        <td>
                            <a href="{{ route('payscales.edit', $payscale) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('payscales.destroy', $payscale) }}" method="POST" class="d-inline">
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
