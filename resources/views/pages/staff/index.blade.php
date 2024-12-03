<x-base-layout>

    
    <div class="card mb-5">
        <div class="card-header">
            <h3 class="card-title">Staff List</h3>
            <div class="card-toolbar">
                <a href="{{ route('staffs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Staff
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
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">First Name</th>
                        <th class="min-w-125px">Last Name</th>
                        <th class="min-w-150px">Email</th>
                        <th class="min-w-100px">Status</th>
                        <th class="text-end min-w-100px">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                    @foreach($staff as $staffMember)
                        <tr>
                            <td>{{ $staffMember->first_name }}</td>
                            <td>{{ $staffMember->last_name }}</td>
                            <td>{{ $staffMember->email }}</td>
                            <td>
                                <span class="badge badge-light-{{ $staffMember->status == 'Active' ? 'success' : 'danger' }}">
                                    {{ $staffMember->status }}
                                </span>
                            </td>
                            <td class="text-end">
                                
                                <a href="{{ route('staffs.edit', $staffMember->id) }}" class="btn btn-light-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <form action="{{ route('staffs.destroy', $staffMember->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-base-layout>
