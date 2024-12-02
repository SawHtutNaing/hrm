<x-base-layout>
    <div class="container">
        <h1 class="mb-4">Add New Staff</h1>
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

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="employee_id">Employee Id</label>
                <input type="text" name="employee_id" id="employee_id" class="form-control" required>
            </div>
            

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="staff_id">Employee ID</label>
                <input type="text" name="staff_id" id="staff_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="national_id">National ID</label>
                <input type="text" name="national_id" id="national_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="position_id">Position</label>
                <select name="position_id" id="position_id" class="form-control" required>
                    <option value="">Select Position</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_of_joining">Date of Joining</label>
                <input type="date" name="date_of_joining" id="date_of_joining" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="current_salary">Current Salary</label>
                <input type="number" name="current_salary" id="current_salary" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="employment_type_id">Employment Type</label>
                <select name="employment_type_id" id="employment_type_id" class="form-control" required>
                    <option value="">Select Employment Type</option>
                    @foreach($employmentTypes as $employmentType)
                        <option value="{{ $employmentType->id }}">{{ $employmentType->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="employmen_type_id">EmploymentType</label>
                <select name="employmen_type_id" id="employmen_type_id" class="form-control" required>
                    <option value="">Select EmploymentType</option>
                    @foreach($employmentTypes as $employmentType)
                        <option value="{{ $employmentType->id }}">{{ $employmentType->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="country_id">Country</label>
                <select name="country_id" id="country_id" class="form-control" required>
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="city_id">City</label>
                <select name="city_id" id="city_id" class="form-control" required>
                    <option value="">Select City</option>
                    <!-- Cities will be loaded based on country selection -->
                </select>
            </div>
            

            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="text" name="zip_code" id="zip_code" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="emergency_contact_name">Emergency Contact Name</label>
                <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="emergency_contact_phone">Emergency Contact Phone</label>
                <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bank_account_number">Bank Account Number</label>
                <input type="text" name="bank_account_number" id="bank_account_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bank_name">Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="terminated">Terminated</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save Staff</button>
        </form>
    </div>
    @section('scripts')
<script>
    // When the country is changed
    $('#country_id').change(function() {
        var country_id = $(this).val(); // Get the selected country ID
        if (country_id) {
            // Make an AJAX request to get the cities based on the selected country
            $.ajax({
                url: '/get-cities/' + country_id, // Endpoint to fetch cities based on country
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var city_select = $('#city_id');
                    city_select.empty(); // Clear the existing options
                    city_select.append('<option value="">Select City</option>'); // Add default option
                    $.each(data, function(key, value) {
                        // Populate the cities dropdown with the new data
                        city_select.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            // If no country is selected, clear the city select
            $('#city_id').empty();
            $('#city_id').append('<option value="">Select City</option>');
        }
    });
</script>
@endsection

</x-base-layout>
