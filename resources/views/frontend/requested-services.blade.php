@extends('frontend.layouts.master')
@section('content')
    <style>
        section.breadcrumb {height: 360px;display: flex;align-items: center;justify-content: center;}

        section.breadcrumb h2 {
            text-transform: capitalize;
        }
        div#weathermap {
            height: 500px;
        }
    </style>
    <section class="breadcrumb">
        <h2>requested services</h2>
    </section>
    <section class="Map">
        <div class="card-body map-z-index">
            <div class="map-js-height" id="weathermap"></div>
        </div>
    </section>

    <script>
        let map;

        function initMap() {
            map = new google.maps.Map(document.getElementById("weathermap"), {
                center: { lat: 37.0902, lng: -95.7129 },
                zoom: 5,
            });


            // Array of country names
            const countries = [
                    @foreach($service_all_data as $service)
                {
                    name: '{{ $service->name }}',
                    location: '{{ $service->location }}',
                    price: '{{ $service->price }}',
                },
                @endforeach
            ];

            countries.forEach(country => {
                geocodeCountry(country);
            });

            // Get location from URL and geocode it
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            let location = urlParams.get('location');
            let serv = urlParams.get('serv');

            if (location) {
                geocodeAddress(location);
            } else {
                console.error("Location parameter not found in URL");
            }
        }
        function geocodeCountry(country) {
            const geocoder = new google.maps.Geocoder();
            const blueMarkerIcon = {
                url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                scaledSize: new google.maps.Size(50, 50)
            };
            geocoder.geocode({ address: country.location }, (results, status) => {
                if (status === "OK" && results[0]) {
                    const marker = new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map,
                        icon: blueMarkerIcon,
                    });


                    const contentString = '<div>' +
                        '<h3>' + country.name + '</h3>' +
                        '<p>Price: $' + country.price + '</p>' +
                        '</div>';

                    const infowindow = new google.maps.InfoWindow({
                        content: contentString,
                    });

                    marker.addListener('click', () => {
                        infowindow.open(map, marker);
                    });
                } else {
                    console.error("Geocode was not successful for the following reason: " + status);
                }
            });
        }

        function geocodeAddress(address) {
            const geocoder = new google.maps.Geocoder();

            geocoder.geocode({ address: address }, (results, status) => {
                if (status === "OK") {
                    map.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        title: address,
                    });
                } else {
                    console.error("Geocode was not successful for the following reason: " + status);
                }
            });
        }
    </script>
    <script>

        async function AutoFill() {
            const fromInput = document.getElementById('location_map');
            const fromAutocomplete = new google.maps.places.Autocomplete(fromInput);
        }

        window.onload = AutoFill;

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF9q3rW1aL52AJ_Yy2KIYVKQyjNn7PLIs&libraries=places&callback=initMap" async defer loading="async"></script>
@endsection
