<x-base-layout>

    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Leave Type</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('leave_types.store') }}" method="POST">
                @csrf
                
                <div class="mb-10">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control form-control-solid" value="{{ old('name') }}" placeholder="Enter leave type name">
                    @error('name')
                        <div class="text-danger fw-bold mt-2">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary me-3">
                        <i class="fas fa-save"></i> Save
                    </button>
                    <a href="{{ route('leave_types.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

</x-base-layout>
