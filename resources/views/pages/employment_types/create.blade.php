<x-base-layout>

    <div class="container">
        <h1>Add Employment Type</h1>
        <form action="{{ route('employment_types.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Employment Type Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

