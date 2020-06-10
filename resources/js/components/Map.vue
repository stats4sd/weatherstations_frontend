
<template>

	<div style="height: 600px; width: 100%">  
    <l-map
      :zoom="zoom"
      :center="center"
      :options="mapOptions"
      @click="getPoint"
     
    >
		<l-tile-layer
		:url="url"
		:attribution="attribution"
		/>
     	<div v-for="station in stations">
      
			<l-marker 
			:lat-lng="[station.latitude, station.longitude]"
			>

			<l-icon
			:icon-size="[64,64]"
			:icon-anchor="[32,10]"
			icon-url="images/station2.png"
			/>
			<l-popup>
				<div>
		            {{ station.label }}
		        </div>
	        </l-popup>
			</l-marker>
	   	</div> 
	   	<div v-for="parcela in parcelas">
	   		<l-polygon :lat-lngs="parcela.poligono_gps" :color="polygon.color">
		   		<l-popup >
		   			<img src="images/plot.jpg">
		   			<p><b>Superficie: </b>{{parcela.superficie_hectareas}} ha</p>
		   			<p><b>Pendiente: </b>{{parcela.pendiente}}</p>
		   			<p><b>Drenaje: </b>{{parcela.drenaje}}</p>
		   			<p><b>Salinidad: </b>{{parcela.salinidad}}</p>

	
		   		</l-popup>
					
		     
	        </l-polygon>
	   	</div> 
    </l-map>
  </div>

</template>
<script type="text/javascript">
	import { latLng } from 'leaflet';
	
	export default {
 
	data() {
		return {
			zoom: 6.5,
			center: latLng(-16.499998, -68.1333328),
			url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
			attribution:
			'&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
			showParagraph: false,
			mapOptions: {
			zoomSnap: 0.5
			},
			showMap: true,
			polygon: {
      
		    	color: 'green'
		    },
		};
	},

	
  props: ['stations', 'parcelas'],
  methods: {
  	getPoint(event) {
  		var distance = [];
  		$.each(this.stations, function(key, value){
  			this.station = latLng(value.latitude,value.longitude);
  			distance.push(this.station.distanceTo(event.latlng));
  		})
  			this.neaster = Math.min(...distance); 
  		console.log(this.neaster);

  		
  	},

   
   
  }
};
</script>
