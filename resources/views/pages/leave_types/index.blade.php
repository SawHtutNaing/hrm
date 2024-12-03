<x-base-layout>
  
    <div class="card mb-5 mb-xl-10">
        <div class="card-header">
            <h3 class="card-title">Leave Types</h3>
            <div class="card-toolbar">
                <a href="{{ route('leave_types.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Leave Type
                </a>
            </div>
        </div>
    </div>

  
    @if(session('success'))
        <div class="alert alert-success">
            <div class="alert-text">{{ session('success') }}</div>
        </div>
    @endif

  
    <div class="card">
        <div class="card-body">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="leaveTypesTable">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-50px">ID</th>
                        <th class="min-w-150px">Name</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @forelse($leaveTypes as $leaveType)
                        <tr>
                            <td>{{ $leaveType->id }}</td>
                            <td>{{ $leaveType->name }}</td>
                            <td class="text-end">
                              
                                <a href="{{ route('leave_types.edit', $leaveType) }}" class="btn btn-light-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                              
                                <form action="{{ route('leave_types.destroy', $leaveType) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No leave types found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
