<x-base-layout>

    <h1>Edit Staff</h1>

    <form action="{{ route('staffs.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $staff->first_name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $staff->last_name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $staff->email) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $staff->phone) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" id="employee_id" value="{{ old('employee_id', $staff->employee_id) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $staff->date_of_birth) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male" {{ $staff->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $staff->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $staff->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="national_id">National ID</label>
            <input type="text" name="national_id" id="national_id" value="{{ old('national_id', $staff->national_id) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="position_id">Position</label>
            <select name="position_id" id="position_id" class="form-control">
                @foreach($positions as $position)
                    <option value="{{ $position->id }}" {{ $staff->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" id="department_id" class="form-control">
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $staff->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_joining">Date of Joining</label>
            <input type="date" name="date_of_joining" id="date_of_joining" value="{{ old('date_of_joining', $staff->date_of_joining) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="current_salary">Current Salary</label>
            <input type="number" name="current_salary" id="current_salary" value="{{ old('current_salary', $staff->current_salary) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="employmen_type_id">Employment Type</label>
            <select name="employmen_type_id" id="employmen_type_id" class="form-control">
                @foreach($employmentTypes as $employmentType)
                    <option value="{{ $employmentType->id }}" {{ $staff->employmen_type_id == $employmentType->id ? 'selected' : '' }}>{{ $employmentType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control">{{ old('address', $staff->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="country_id">Country</label>
            <select name="country_id" id="country_id" class="form-control">
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $staff->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city_id">City</label>
            <select name="city_id" id="city_id" class="form-control">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $staff->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="zip_code">Zip Code</label>
            <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $staff->zip_code) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="emergency_contact_name">Emergency Contact Name</label>
            <input type="text" name="emergency_contact_name" id="emergency_contact_name" value="{{ old('emergency_contact_name', $staff->emergency_contact_name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="emergency_contact_phone">Emergency Contact Phone</label>
            <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" value="{{ old('emergency_contact_phone', $staff->emergency_contact_phone) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="bank_account_number">Bank Account Number</label>
            <input type="text" name="bank_account_number" id="bank_account_number" value="{{ old('bank_account_number', $staff->bank_account_number) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $staff->bank_name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
            @if ($staff->profile_picture)
                <img src="{{ asset('storage/' . $staff->profile_picture) }}" alt="Profile Picture" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ $staff->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $staff->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="terminated" {{ $staff->status == 'terminated' ? 'selected' : '' }}>Terminated</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Staff</button>
    </form>

</x-base-layout>
