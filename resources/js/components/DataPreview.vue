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
                        :meteoParameters.sync="meteoParameters"
                        :meteoParameterSelected.sync="meteoParameterSelected"
                        :years.sync="years"
                        :yearSelected.sync="yearSelected"
                        :parcelasModules.sync="parcelasModules"
                        :cultivosModules.sync="cultivosModules"
                        :modulesSelected.sync="modulesSelected"
                        :parcelasModulesSelected.sync="parcelasModulesSelected"
                        :cultivosModulesSelected.sync="cultivosModulesSelected" 
                        :weather.sync="weather" 
                        :senamhi.sync="senamhi"
                        :parcelasData.sync="parcelasData"
                        :suelos.sync="suelos"
                        :manejo_parcelas.sync="manejo_parcelas"
                        :plagas.sync="plagas"
                        :enfermedades.sync="enfermedades"
                        :rendimentos.sync="rendimentos"
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
                        <b-tab v-if="senamhi.length!==0" title="Senamhi data" active>
                            <b-card-text>
                                <p v-if="senamhi.length!==0">Showing {{senamhi.to}} of {{senamhi.total}} entries</p> 
                                <tables :data="senamhi.data"></tables>
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
                        <b-tab v-if="plagas.length!==0" title="Plagas">
                            <b-card-text>
                                <p v-if="plagas.length!==0">Showing {{plagas.to}} of {{plagas.total}} entries</p>
                                <tables :data="plagas.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="enfermedades.length!==0" title="Enfermedades">
                            <b-card-text>
                                <p v-if="enfermedades.length!==0">Showing {{enfermedades.to}} of {{enfermedades.total}} entries</p>
                                <tables :data="enfermedades.data"></tables>
                            </b-card-text>
                        </b-tab>
                        <b-tab v-if="rendimentos.length!==0" title="Rendimentos">
                            <b-card-text>
                                <p v-if="rendimentos.length!==0">Showing {{rendimentos.to}} of {{rendimentos.total}} entries</p>
                                <tables :data="rendimentos.data"></tables>
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
                modules: [{label:'Información meteorológica', value:'daily_data'},{label:'Parcelas', value:'parcelas'}, {label:'Cultivos', value:'cultivos'} ],

                aggregations: [{label: 'Senamhi daily', value:'senamhi_daily'}, {label: 'Senamhi monthly', value:'senamhi_monthly'}, {label: 'Daily', value:'daily_data'}, {label: 'Ten days', value:'tendays_data'}, {label: 'Monthly', value:'monthly_data'}, {label: 'yearly', value:'yearly_data'}],

                meteoParameters: [
                    {label: 'Temperatura Máxima Interna (°C)', value:'max_temperatura_interna'}, {label: 'Temperatura Mínima Interna (°C)', value:'min_temperatura_interna'}, {label: 'Temperatura Media Interna (°C)', value:'avg_temperatura_interna'},
                    {label: 'Temperatura Máxima Externa (°C)', value:'max_temperatura_externa'}, {label: 'Temperatura Mínima Externa (°C)', value:'min_temperatura_externa'}, {label: 'Temperatura Media Externa (°C)', value:'avg_temperatura_externa'}, 
                    {label: 'Humedad Máxima Interna %', value:'max_humedad_interna'}, {label: 'Humedad Mínima Interna %', value:'min_humedad_interna'}, {label: 'Humedad Media Interna %', value:'avg_humedad_interna'},
                    {label: 'Humedad Máxima Externa %', value:'max_humedad_externa'}, {label: 'Humedad Mínima Externa %', value:'min_humedad_externa'}, {label: 'Humedad Media Externa %', value:'avg_humedad_externa'}, 
                    {label: 'Presion Relativa Máxima (hPa)', value:'max_presion_relativa'}, {label: 'Presion Relativa Mínima (hPa)', value:'min_presion_relativa'}, {label: 'Presion Relativa Media (hPa)', value:'avg_presion_relativa'}, 
                    {label: 'Presion absoluta Máxima (hPa)', value:'max_presion_absoluta'}, {label: 'Presion absoluta Mínima (hPa)', value:'min_presion_absoluta'}, {label: 'Presion absoluta Media (hPa)', value:'avg_presion_absoluta'},
                    {label: 'Velocidad Viento Máxima (m/s)', value:'max_velocidad_viento'}, {label: 'Velocidad Viento Mínima (m/s)', value:'min_velocidad_viento'}, {label: 'Velocidad Viento Media (m/s)', value:'avg_velocidad_viento'},
                    {label: 'Sensacion Termica Máxima (°C)', value:'max_sensacion_termica'}, {label: 'Sensacion Termica Mínima (°C)', value:'min_sensacion_termica'}, {label: 'Sensacion Termica Media (°C)', value:'avg_sensacion_termica'}, 
                    {label: 'Precipitación Diaria (mm)', value:'lluvia_24_hors_total'} 
                ],

                parcelasModules: [{label:'Suelos', value:'suelos'},{label:'Manejo de la parcela', value:'manejo_parcelas'}, {label:'Plagas', value:'plagas'}, {label:'Enfermedades', value:'enfermedades'}, {label:'Rendimentos', value:'rendimentos'} ],

                cultivosModules: [{label:'Fenologia', value:'fenologia'},{label:'Manejo de la parcela', value:'manejo_parcelas'}, {label:'Plagas', value:'plagas'}, {label:'Enfermedades', value:'enfermedades'}, {label:'Rendimentos', value:'rendimentos'} ],
      
                startDate:null,
                endDate:null,
                weather:[],
                senamhi:[],
                parcelasData:[],
                fenologia:[],
                suelos:[],
                manejo_parcelas:[],
                plagas:[],
                enfermedades:[],
                parcelas:[],
                stations:[],
                departamentos:[],
                municipios:[],
                comunidads:[],
                comunidadsSelected:[],
                modulesSelected:[],
                meteoParameterSelected:[],
                yearSelected:[],
                parcelasModulesSelected:[],
                cultivosModulesSelected:[],
                stationsSelected:[],
                aggregationSelected:[],
                cultivos:[],
                rendimentos:[],
                showTable:false,
                years:[],

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
            }),
            axios.get('api/years').then((response) => {
                this.years = response.data;
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
                    
                    window.location.href = result.data['path'];
                }, (error) => {
                    console.log(error);
                });          
               
            }
        }
       
    }

 </script>