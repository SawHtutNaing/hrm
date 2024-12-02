<x-base-layout>

    <div class="container">
        <h1>Edit PayScale</h1>
        <form action="{{ route('payscales.update', $payscale) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $payscale->name }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" value="{{ $payscale->amount }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

