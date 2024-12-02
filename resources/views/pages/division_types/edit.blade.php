<x-base-layout>

    <div class="container">
        <h1>Edit Division Type</h1>
        <form action="{{ route('division_types.update', $divisionType) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $divisionType->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

