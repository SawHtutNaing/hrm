<x-base-layout>

    <div class="container">
        <h1>Add Department</h1>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="division_id">Division</label>
                <select id="division_id" name="division_id" class="form-control" required>
                    <option value="">-- Select Division --</option>
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

