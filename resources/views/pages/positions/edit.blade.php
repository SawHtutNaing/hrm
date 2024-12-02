<x-base-layout>

    <div class="container">
        <h1>Edit Position</h1>
        <form action="{{ route('positions.update', $position) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Position Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $position->name }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="payscale_id">PayScale</label>
                <select id="payscale_id" name="payscale_id" class="form-control" required>
                    <option value="" disabled>Select PayScale</option>
                    @foreach($payscales as $payscale)
                        <option value="{{ $payscale->id }}" {{ $position->payscale_id == $payscale->id ? 'selected' : '' }}>
                            {{ $payscale->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

