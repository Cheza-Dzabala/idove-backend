<section class="page-section">
    <div class="section-content">
        <div class="section-title">
            <h1>Our Presence</h1>
        </div>
        <div class="section-details">
            <div id="map-container" class="map-container"></div>
        </div>
    </div>
</section>

@section('js')
    <script>
        let mapData = [];
        let i;

        const getMapData = () => {
            $.get('/api/maps', function(response, status) {
                if (status === 'success') {
                    mapData = response.data;
                } else {
                    alert('Something went wrong and we couldn\'t configure the map, please try again');
                }
            });
        }

        getMapData();

        let map = new Datamap({
            element: document.getElementById('map-container'),
            fills: {
                defaultFill: 'rgb(26, 86, 50)',
            },
            geographyConfig: {
                highlightFillColor: 'rgb(159, 34, 65)',
                borderWidth: 2,
                borderOpacity: 0.1,
                borderColor: 'rgb(180, 162, 105)',
                highlightBorderWidth: 2,
                highlightBorderOpacity: 0.1,
                popupTemplate: function(geography, data) {
                    console.log(mapData.length);
                    let i;
                    let country;
                    for (i = 0; i < mapData.length; i++) {
                        if (geography.properties.name === mapData[i].name) {
                            country = mapData[i];
                        }
                    }
                    return '<div class="hoverinfo" style="padding: 15px; margin-top: 65vh;">' +
                        '<p style="font-weight: bold">' + geography.properties.name + '</p>' +
                        '<p>Number of iDovers: ' + country.idovers + '</p>' +
                        '</div>'
                },
            },
            dataType: 'json',
            data: mapData
        });

    </script>
@endsection
