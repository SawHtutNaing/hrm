<x-base-layout>

    <div class="container">
        <h1>Add PayScale</h1>
        <form action="{{ route('payscales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label for="amount">Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
    </div>
</x-base-layout>

