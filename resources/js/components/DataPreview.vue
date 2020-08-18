<template>
    <div>
	<div class="row">
        <div class="col-sm-4 mb-5">
            <div class="card">
                <div class="container mt-5">
              
              
                	<control-panel 
                        :departamentos="departamentos"
                        :municipios="municipios"
                        :comunidads="comunidads" 
                        :comunidadsSelected.sync="comunidadsSelected" 
                        :startDate.sync="startDate" 
                        :endDate.sync="endDate" 
                        :modules.sync="modules" 
                        :aggregations.sync="aggregations"
                        :aggregationSelected.sync="aggregationSelected"
                        :parcelasModules.sync="parcelasModules"
                        :cultivosModules.sync="cultivosModules"
                        :modulesSelected.sync="modulesSelected"
                        :parcelasModulesSelected.sync="parcelasModulesSelected"
                        :cultivosModulesSelected.sync="cultivosModulesSelected" 
                        :weather.sync="weather" 
                        :pachagrama.sync="pachagrama" 
                        :parcelasData.sync="parcelasData"
                        :suelos.sync="suelos"
                        :manejo_parcelas.sync="manejo_parcelas"
                        :plagas_y_enfermedades.sync="plagas_y_enfermedades"
                        :produccion.sync="produccion"
                        :fenologia.sync="fenologia"
                        :stations="stations" 
                        :stationsSelected.sync="stationsSelected"
                        :showTable.sync="showTable" >
                    </control-panel>
                </div>
            </div>
        </div>
        <div class="col-sm-8 mb-5">
            <bolivia-map
            :stations="stations"
            :parcelas="parcelas"
            :stationsSelected.sync="stationsSelected" 

            ></bolivia-map>
            <div class="mt-5">
                <b-card no-body v-if="showTable">
                    <b-tabs pills card>
                        <b-tab v-if="weather.length!==0" title="Información meteorológica" active>
                            <b-card-text>
                                <p v-if="weather.length!==0">Showing {{weather.to}} of {{weather.total}} entries</p> 
                                <tables :data="weather.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="pachagrama.length!==0" title="Información de Pachagrama">
                            <b-card-text>
                                <p v-if="pachagrama.length!==0">Showing {{pachagrama.to}} of {{pachagrama.total}} entries</p>
                                <tables :data="pachagrama.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="parcelasData.length!==0" title="Parcelas">
                            <b-card-text>
                                <p v-if="parcelasData.length!==0">Showing {{parcelasData.to}} of {{parcelasData.total}} entries</p>
                                <tables :data="parcelasData.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="fenologia.length!==0" title="Fenologia">
                            <b-card-text>
                                <p v-if="fenologia.length!==0">Showing {{fenologia.to}} of {{fenologia.total}} entries</p>
                                <tables :data="fenologia.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="suelos.length!==0" title="Suelos">
                            <b-card-text>
                                <p v-if="suelos.length!==0">Showing {{suelos.to}} of {{suelos.total}} entries</p>
                                <tables :data="suelos.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="manejo_parcelas.length!==0" title="Manejo de la parcelas">
                            <b-card-text>
                                <p v-if="manejo_parcelas.length!==0">Showing {{manejo_parcelas.to}} of {{manejo_parcelas.total}} entries</p>
                                <tables :data="manejo_parcelas.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="plagas_y_enfermedades.length!==0" title="Plagas y enfermedades">
                            <b-card-text>
                                <p v-if="plagas_y_enfermedades.length!==0">Showing {{plagas_y_enfermedades.to}} of {{plagas_y_enfermedades.total}} entries</p>
                                <tables :data="plagas_y_enfermedades.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="produccion.length!==0" title="Produccion">
                            <b-card-text>
                                <p v-if="produccion.length!==0">Showing {{produccion.to}} of {{produccion.total}} entries</p>
                                <tables :data="produccion.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <button class="site-btn mt-5 mb-2 mx-2" v-on:click="download" style="float: right;">Download</button>
                    </b-tabs>
              </b-card>
            </div>
        </div>
    </div>
                      

           

		

        </div>
    
</template>
<script type="text/javascript">
export default {
        data(){
            return{
                modules: [{label:'Información meteorológica', value:'daily_data'},{label:'Información de Pachagrama (agroclimático)', value:'pachagrama'}, {label:'Parcelas', value:'parcelas'}, {label:'Cultivos', value:'cultivos'} ],

                aggregations: [{label: 'Daily', value:'daily_data'}, {label: 'Ten days', value:'tendays_data'}, {label: 'Monthly', value:'monthly_data'}, {label: 'yearly', value:'yearly_data'}],

                parcelasModules: [{label:'Suelos', value:'suelos'},{label:'Manejo de la parcela', value:'manejo_parcelas'}, {label:'Plagas y enfermedades', value:'plagas_y_enfermedades'}, {label:'Produccion', value:'produccion'} ],

                cultivosModules: [{label:'Fenologia', value:'fenologia'},{label:'Manejo de la parcela', value:'manejo_parcelas'}, {label:'Plagas y enfermedades', value:'plagas_y_enfermedades'}, {label:'Produccion', value:'produccion'} ],
      
                startDate:null,
                endDate:null,
                weather:[],
                pachagrama:[],
                parcelasData:[],
                fenologia:[],
                suelos:[],
                manejo_parcelas:[],
                plagas_y_enfermedades:[],
                parcelas:[],
                stations:[],
                departamentos:[],
                municipios:[],
                comunidads:[],
                comunidadsSelected:[],
                modulesSelected:[],
                parcelasModulesSelected:[],
                cultivosModulesSelected:[],
                stationsSelected:[],
                aggregationSelected:[],
                cultivos:[],
                produccion:[],
                showTable:false,

            }

        },
        mounted () {

            axios.get('api/departamentos').then((response) => {
                this.departamentos = response.data;
            }),
            axios.get('api/municipios').then((response) => {
                this.municipios = response.data;
            }),
            axios.get('api/comunidads').then((response) => {
                this.comunidads = response.data;
            }),
            axios.get('api/stations').then((response) => {
                this.stations = response.data;
            }),
            axios.get('api/parcelas').then((response) => {
                this.parcelas = response.data;
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
                        aggregationSelected: this.aggregationSelected,
                        startDate: this.startDate,
                        endDate: this.endDate,
                        stationsSelected: this.stationsSelected,
                        parcelasModulesSelected: this.parcelasModulesSelected,
                        cultivosModulesSelected: this.cultivosModulesSelected,
                    }
                })
                .then((result) => {
                    
                    // window.location.href = result.data['path'];
                }, (error) => {
                    console.log(error);
                });          
               
            }
        }
       
    }

 </script>