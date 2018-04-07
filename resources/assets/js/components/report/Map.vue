<template>
    <el-container>
        <el-main>
            <el-row>
                <gmap-autocomplete placeholder="Search place" :selectFirstOnEnter="true" class="form-control" style="width: 300px;" @place_changed="placeChange" />
            </el-row>
            <el-row>
                <gmap-map :center="center" :zoom="zoom" style="width: 500px; height: 500px">
                    <gmap-marker :key="indexMarker" v-for="(m, indexMarker) in markers" :position="m.position" :clickable="true" @click="markerClicked(m)" :label="m.label" :icon="m.icon" :title="m.title"></gmap-marker>
                    <gmap-circle :key="c.id" v-for="(c, indexCircle) in circles" :center="c.center" :options="c.options"></gmap-circle>
                </gmap-map>
               
            </el-row>
        </el-main>
    </el-container>
</template>
<script>
export default {

    name: 'Map',

    data() {
        return {
            
            center: {
                lat: 14.612612,
                lng: 120.981686
            },
            circles: [],
            markers: [],
            zoom: 8,
            locationSearchBar: ''

        }
    },
    mounted: function() {
        this.getDevice();
    },
    methods: {
        placeChange: function(location) {
            this.center = location.geometry.location;
            this.zoom = 15;
        },
        markerClicked: function(data) {
            this.center = data.position;
            this.zoom = 13;
        },
        getDevice: function(page) {
            var vm = this;
            axios.get('/map').then(function(response) {

                vm.setMarkers(response.data);
            });
        },
        setMarkers: function(datas) {
            var markers = [],
                circles = [];

            _.each(datas, function(data) {
                var marker = {
                    position: {
                        lat: parseFloat(data.latitude),
                        lng: parseFloat(data.longitude)
                    },
                    title: data.name,
                    label: data.name,
                    icon: {
                        url: 'https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png',

                    }
                }
                var circle = {
                    center: {
                        lat: parseFloat(data.latitude),
                        lng: parseFloat(data.longitude)
                    },
                    options: {
                        strokeColor: '#FF0000',
                        strokeWeight: 4,
                        fillOpacity: 0
                    }


                }
                markers.push(marker);
                circles.push(circle);
            });

            this.markers = markers;
            this.circles = circles;

        }
    }
}
</script>
<style lang="css" scoped>
</style>
