@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Vehicles List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>License Plate</th>
                    <th>Mileage</th>
                    <th>Maintenance mileage</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->license_plate }}</td>
                        <td>

                            <span class="mileage" data-id="{{ $vehicle->id }}"
                                  data-mileage="{{ $vehicle->mileage }}"
                                  ondblclick="editMileage(this)">
                                {{ $vehicle->mileage }}
                            </span>
                            <input type="number" class="form-control mileage-input"
                                   style="display:none;"
                                   data-id="{{ $vehicle->id }}"
                                   value="{{ $vehicle->mileage }}"
                                   onchange="updateMileage(this)">
                        </td>
                        <td>{{ $vehicle->maintenance_interval_mileage}}</td>
                        <td>

                           <p style="color: gray">Double click on the mileage to update  </p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>

        function editMileage(element) {
            var mileageSpan = element;
            var vehicleId = mileageSpan.getAttribute("data-id");
            var mileageValue = mileageSpan.getAttribute("data-mileage");


            var inputField = mileageSpan.nextElementSibling;
            inputField.style.display = "block";
            mileageSpan.style.display = "none";

            inputField.focus();
        }


        function updateMileage(input) {
            var vehicleId = input.getAttribute("data-id");
            var newMileage = input.value;

            // Send the updated mileage to the server using AJAX
            fetch('/vehicles/' + vehicleId, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    mileage: newMileage,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    var mileageSpan = document.querySelector(`span[data-id='${vehicleId}']`);
                    mileageSpan.textContent = newMileage;


                    input.style.display = "none";
                    mileageSpan.style.display = "inline";
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
@endsection
