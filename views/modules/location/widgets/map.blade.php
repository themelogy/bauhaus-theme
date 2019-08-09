<div id="map" class="map-2" style="height: 300px;"></div>
@if(isset($location->lat) && isset($location->long))
    @push('js-inline')
        <script>
            function initMap() {
                var coordinate = {lat: {{ $location->lat }}, lng: {{ $location->long }} };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: coordinate
                });
                var marker = new google.maps.Marker({
                    position: coordinate,
                    map: map,
                    icon: "{{ Theme::url('images/logos/favicon.png') }}",
                    zIndex: 9999999
                });
                marker.addListener('click', function () {
                    infoWindow.open(map, marker);
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ setting('contact::contact-map-key') }}&callback=initMap"></script>
    @endpush
@endif
