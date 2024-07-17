@extends('backend.partials.master')
@section('content')

    <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-12 col-sm-12">
                  <form class="card" method="POST" action="{{route('update_user_profile')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="card-header">
                      <h4 class="card-title mb-0">Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        @if (session('error'))
                            <div class="alert alert-danger w-100" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success w-100" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-md-12 mb-2">
                          <div class="profile-title">
                            <div class="d-flex">
                                <div class="updated_profile">
                                  <div class="pen_design">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M290.7 93.2l128 128-278 278-114.1 12.6C11.4 513.5-1.6 500.6 .1 485.3l12.7-114.2 277.9-277.9zm207.2-19.1l-60.1-60.1c-18.8-18.8-49.2-18.8-67.9 0l-56.6 56.6 128 128 56.6-56.6c18.8-18.8 18.8-49.2 0-67.9z"/></svg>
                                    <input type="file" name="profile_pic" id="profile_pic">
                                  </div>
                                  <div id="imageContainer">
                                    @php
                                        $imageUrl = null;
                                        if (isset($user_profile_pic[0]['profile_pic']) && Storage::exists('public/' . $user_profile_pic[0]['profile_pic'])) {
                                            $imageUrl = Storage::url('public/' . $user_profile_pic[0]['profile_pic']);
                                        }
                                    @endphp

                                    @if(!$imageUrl)
                                        <img id="Profile_Picture" class="img-100 rounded-circle" alt="" src="{{ asset('backend_assets/images/other-images/sad.png') }}">
                                    @else
                                        <img id="Profile_Picture" class="img-100 rounded-circle" alt="" src="{{ $imageUrl }}">
                                    @endif

                                  </div>
                                </div>
                              <div class="flex-grow-1">
                                <h4 class="mb-1">{{$user[0]['name']}}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input value="{{$user[0]['name']}}" name="name" class="form-control" type="text" placeholder="Name" required>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input value="{{$user[0]['email']}}" name="email" class="form-control" type="email" placeholder="Email" disabled>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input value="{{$user_details[0]['phone']}}" name="phone" class="form-control" type="number" placeholder="Phone Number">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input value="{{$user_details[0]['address']}}" name="address" class="form-control" type="text" placeholder="Home Address">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input value="{{$user_details[0]['postal_code']}}" name="postal_code" class="form-control" type="number" placeholder="ZIP Code">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select name="country" class="form-control btn-square" id="country" onchange="fetchCities()">
                              <option value="" disabled selected>--Select--</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">City</label>
                            <select name="city" class="form-control btn-square" id="city">
                              <option value="" disabled selected>--Select--</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div>
                            <label class="form-label">About Me</label>
                            <textarea name="about_me" class="form-control" rows="4" placeholder="Enter About your description">{{$user_details[0]['about_me']}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>


<script>

        function fetchCountry(selectedCountry) {
            const countryCode = document.getElementById('country');

            fetch('{{ route("get-country") }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
            .then(response => response.json())
            .then(data => {
                countryCode.innerHTML = '<option disabled>Select Country</option>';
                if (data.data) {
                    data.data.forEach(country => {
                        const option = document.createElement('option');
                        option.value = country.name;
                        option.textContent = country.name;
                        if (country.name === selectedCountry) {
                            option.selected = true;
                        }
                        countryCode.appendChild(option);
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching countries:', error);
            });
        }

        function fetchCities(selectedCountry, selectedCity) {
            const countryCode = document.getElementById('country').value || selectedCountry;
            const citySelect = document.getElementById('city');

            fetch('{{ route('get-cities') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ country_code: countryCode })
            })
            .then(response => response.json())
            .then(data => {
                citySelect.innerHTML = '<option disabled>Select City</option>';
                if (data.data) {
                    data.data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city;
                        option.textContent = city;
                        if (city === selectedCity) {
                            option.selected = true;
                        }
                        citySelect.appendChild(option);
                    });
                } else if (data.error) {
                    const option = document.createElement('option');
                    option.value = data.error;
                    option.textContent = data.error;
                    citySelect.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Error fetching cities:', error);
            });
        }

        // Initialize the functions with the selected country and city
        document.addEventListener('DOMContentLoaded', function() {
            const selectedCountry = '{{ $user_details[0]["country"] }}';
            const selectedCity = '{{ $user_details[0]["city"] }}';
            fetchCountry(selectedCountry);
            fetchCities(selectedCountry, selectedCity);

            // Add event listener to fetch cities when country changes
            document.getElementById('country').addEventListener('change', function() {
                fetchCities(this.value);
            });
        });


        jQuery(document).ready(function() {
            jQuery('#profile_pic').change(function() {
                var imageContainer = jQuery('#imageContainer')[0];
                var fileInput = jQuery(this)[0];

                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // Display the selected image in the specified container
                        imageContainer.innerHTML = '<img class="img-100 rounded-circle" src="' + e.target.result + '">';
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                } else {
                    imageContainer.innerHTML = '<img id="Profile_Picture" class="img-100 rounded-circle" alt="" src="{{ asset('backend_assets/images/other-images/sad.png') }}">'; // Clear the container if no file is selected
                }
            });
        });
</script>


@endsection
