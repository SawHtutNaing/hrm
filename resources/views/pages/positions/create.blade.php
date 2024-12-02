<x-base-layout>

    <div class="container">
        <h1>Add Position</h1>
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Position Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="payscale_id">PayScale</label>
                <select id="payscale_id" name="payscale_id" class="form-control" required>
                    <option value="" disabled selected>Select PayScale</option>
                    @foreach($payscales as $payscale)
                        <option value="{{ $payscale->id }}">{{ $payscale->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

