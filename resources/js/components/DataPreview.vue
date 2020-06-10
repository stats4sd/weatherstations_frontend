<template>
    <div>
    <bolivia-map
    :stations="stations"
    :parcelas="parcelas"
    ></bolivia-map>

	<div class="row">
        <div class="col-sm-4 mb-5">
          <div class="card">
      
            <div class="container mt-5">
              
              
	<control-panel 
        :comunidads="comunidads" 
        :comunidadsSelected.sync="comunidadsSelected" 
        :startDate.sync="startDate" 
        :endDate.sync="endDate" 
        :modules.sync="modules" 
        :modulesSelected.sync="modulesSelected" 
        :weather.sync="weather" 
        :pachagrama.sync="pachagrama" 
        :stations="stations" 
        :stationsSelected.sync="stationsSelected" >
    </control-panel>
              

            </div>
          </div>
        </div>

        <div class="col-sm-8 mb-5">
            <div>
                <b-card no-body>
                    <b-tabs pills card>
                        <b-tab v-if="weather.length!==0" title="Información meteorológica" active>

                            <b-card-text>
                                <p v-if="weather.length!==0">Showing {{weather.to}} of {{weather.total}} entries</p> 
                                <tables :data="weather.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="pachagrama.length!==0" title="Información de Pachagrama">
                            <b-card-text>
                                <p v-if="pachagrama,length!==0">Showing {{pachagrama.to}} of {{pachagrama.total}} entries</p>
                                <tables :data="pachagrama.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-button class="ml-3 mb-3" variant="primary" v-on:click="download">Download</b-button>
                    </b-tabs>
              </b-card>
            </div>

		</div>

        </div>
      </div>
    </div>
</template>
<script type="text/javascript">
export default {
        data(){
            return{
                modules:[{label:'Información meteorológica', value:'daily_data'},{label:'Información de Pachagrama (agroclimático)', value:'pachagrama'}, {label:'Cultivos', value:'cultivos'}, {label:'Suelos', value:'suelos'}, {label:'Plagas', value:'plagas_y_enfermedades'}],
      
                startDate:null,
                endDate:null,
                weather:[],
                pachagrama:[],
                parcelas:[],
                stations:[],
                comunidads:[],
                comunidadsSelected:[],
                modulesSelected:[],
                stationsSelected:[]

            }

        },
        mounted () {

            axios.get('api/comunidads').then((response) => {
                this.comunidads = response.data;
            }),
            axios.get('api/stations').then((response) => {
                this.stations = response.data;
            }),
            axios.get('api/parcelas').then((response) => {
                this.parcelas = response.data;
                console.log( this.parcelas);
            })
        },
        methods: {
            download: function (event) {
                axios({
                    method: 'post',
                    url: "/download",
                    data: {
                        comunidadsSelected: this.comunidadsSelected,
                        modulesSelected: this.modulesSelected,
                        startDate: this.startDate,
                        endDate: this.endDate,
                        stationsSelected: this.stationsSelected,
                    }
                })
                .then((result) => {
                    
                    window.location.href = result.data['path'];
                }, (error) => {
                    console.log(error);
                });          
               
            }
        }
       
    }

 </script>