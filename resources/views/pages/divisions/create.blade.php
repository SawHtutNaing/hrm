<x-base-layout>




    <div class="container">
        <h1>Add Division</h1>
        <form action="{{ route('divisions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="division_type_id">Division Type</label>
                <select id="division_type_id" name="division_type_id" class="form-control" required>
                    @foreach($divisionTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>


</x-base-layout>

