<x-base-layout>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Staff</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

               
                <div class="mb-10">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Employee ID</label>
                    <input type="text" name="employee_id" id="employee_id" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-select form-select-solid" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">National ID</label>
                    <input type="text" name="national_id" id="national_id" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Position</label>
                    <select name="position_id" id="position_id" class="form-select form-select-solid" required>
                        <option value="">Select Position</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Department</label>
                    <select name="department_id" id="department_id" class="form-select form-select-solid" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Employment Type</label>
                    <select name="employmen_type_id" id="employment_type_id" class="form-select form-select-solid" required>
                        <option value="">Select Employment Type</option>
                        @foreach($employmentTypes as $employmentType)
                            <option value="{{ $employmentType->id }}">{{ $employmentType->name }}</option>
                        @endforeach
                    </select>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control form-control-solid" rows="3" required></textarea>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Country</label>
                    <select name="country_id" id="country_id" class="form-select form-select-solid" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">City</label>
                    <select name="city_id" id="city_id" class="form-select form-select-solid" required>
                        <option value="">Select City</option>
                       
                    </select>
                </div>
                <div class="mb-10">
                    <label lass="form-label"  for="date_of_joining">Date of Joining</label>
                    <input type="date" name="date_of_joining" id="date_of_joining" class="form-control form-control-solid"required>
                </div>
               
                <div class="mb-10">
                    <label class="form-label">Zip Code</label>
                    <input type="text" name="zip_code" id="zip_code" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Emergency Contact Name</label>
                    <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control form-control-solid" required>
                </div>

                <div class="mb-10">
                    <label class="form-label">Emergency Contact Phone</label>
                    <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Bank Account Number</label>
                    <input type="text" name="bank_account_number" id="bank_account_number" class="form-control form-control-solid" required>
                </div>

                <div class="mb-10">
                    <label class="form-label">Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name" class="form-control form-control-solid" required>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Status</label>
                    <select name="status" id="status" class="form-select form-select-solid" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="terminated">Terminated</option>
                    </select>
                </div>

               
                <div class="mb-10">
                    <label class="form-label">Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="form-control form-control-solid">
                </div>

               
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Staff
                    </button>
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
    <script>
        // Dynamically load cities based on selected country
        $('#country_id').change(function() {
            const country_id = $(this).val();
            if (country_id) {
                $.ajax({
                    url: `/get-cities/${country_id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        const citySelect = $('#city_id');
                        citySelect.empty();
                        citySelect.append('<option value="">Select City</option>');
                        data.forEach(city => {
                            citySelect.append(`<option value="${city.id}">${city.name}</option>`);
                        });
                    }
                });
            } else {
                $('#city_id').empty().append('<option value="">Select City</option>');
            }
        });
    </script>
    @endsection
</x-base-layout>
