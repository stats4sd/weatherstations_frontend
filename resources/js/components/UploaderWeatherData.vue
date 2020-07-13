<template>
    <div class="container">
        <progress-bar
            :current-step="currentStep"
            :steps="steps"
        />
        <div
            id="survey-sections"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                        >
                            Step 1: {{ steps[0].title }}
                        </button>
                    </div>
                    <div
                        id="collapseOne"
                        class="collapse show"
                        data-parent="#survey-sections"
                    >
                        <div class="py-4 mx-4">
                            <h3>Upload the file</h3>
                            
                            <div class="row mx-4 justify-content-center">
                                <label class="control-label col-sm-6" style="color: black"><h5>Select the file</h5>
                                    <b-form-file  v-model="file" placeholder="Choose a file or drop it here..."></b-form-file>
                                </label>
                            </div>
                            <div class="row mx-4 justify-content-center">
                                <label class="control-label col-sm-6" style="color: black"><h5>Select the station</h5>
                                    <v-select :options="stations" :reduce="label => label.id" v-model="selectedStation"></v-select>
                                </label>
                            </div>
                            <h3>Select the units</h3>
                            <p class="mt-3">Select the units present in the file for the following variables.</p>

                            <div class="row img-block py-4 mx-4 justify-content-center">
                                <label class="control-label col-sm-3" style="color: black"><h5>Temperatura</h5>
                                <b-form-select v-model="selectedUnitTemp" :options="unitTemp"></b-form-select>
                                </label>
                                <label class="control-label col-sm-3" style="color: black"><h5>Presión</h5>
                                <b-form-select v-model="selectedUnitPres" :options="unitPres"></b-form-select>
                                </label>
                                <label class="control-label col-sm-3" style="color: black"><h5>Velocidad del viento</h5>
                                <b-form-select v-model="selectedUnitWind" :options="unitWind"></b-form-select>
                                </label>
                                <label class="control-label col-sm-3" style="color: black"><h5>Precipitación</h5>
                                <b-form-select v-model="selectedUnitRain" :options="unitRain"></b-form-select>
                                </label>
                            </div>
                               
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo"  v-on:click="nextToForm('uploadfile'); submit();">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="survey-core"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active collapsed"
                            data-toggle="collapse"
                            data-target="#collapseTwo"
                        >
                        <b-spinner v-if="busy" label="Spinning"></b-spinner>
                            Step 2: {{ steps[1].title }}
                        </button>
                    </div>
                    <div
                        id="collapseTwo"
                        class="collapse"
                        data-parent="#survey-core"
                    >
                        <div class="py-4 mx-4">
                            <h3>Data Preview</h3>
                            <p class="mt-3">This is an example of your data.</p>
                            <div class="row py-4 mx-4 justify-content-center">
                                <b-alert show v-if="items!=null">There are rows {{total_rows}}</b-alert>

                                <b-table striped hover responsive :items="items"></b-table>
                                
                            </div>

                             <div class="row py-4 mx-4 justify-content-center">
                                <canvas id="myChart" width="400" height="400"></canvas>
                                
                            </div>

                            <div class="row py-4 mx-4 justify-content-center" v-if="error_data!=null">
                                <b-alert show variant="danger" v-if="error_temp || error_press || error_wind||error_rain ">There are some values with the wrong units please check the following table and proceed with 'Convert Data' or press 'Cancel' for uploading a new file.</b-alert>

                                <b-table sticky-header="600px" striped hover responsive :items="error_data">
                                    <template v-if="error_temp" v-slot:cell(temperatura_interna)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(temperatura_externa)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(sensacion_termica)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(punto_rocio)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(wind_chill)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(hi_temp)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(low_temp)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_temp" v-slot:cell(low_temp)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_press" v-slot:cell(presion_relativa)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_press" v-slot:cell(presion_absoluta)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_wind" v-slot:cell(velocidad_viento)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_wind" v-slot:cell(rafaga)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_wind" v-slot:cell(hi_speed)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_rain" v-slot:cell(lluvia_hora)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_rain" v-slot:cell(lluvia_24_horas)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_rain" v-slot:cell(lluvia_semana)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_rain" v-slot:cell(lluvia_mes)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_rain" v-slot:cell(lluvia_total)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>
                                    <template v-if="error_rain" v-slot:cell(rain)="data">
                                        <b :style="tempIntBackColor">{{ data.value }}</b>
                                    </template>

                                </b-table>
                                
                            </div>
                                
                              
                            <div style="text-align: center;">
                                <b-alert show variant="danger" v-if="error!=null">{{error}}</b-alert>
                                <b-alert show variant="success" v-if="success!=null">{{success}}</b-alert>
                               
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="cleanTable" style="background: red;">
                                    Cancel
                                </button>
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('units'); showAllData();">
                                    Convert Data
                                </button>
                                <button v-if="error_temp && error_press && error_wind && error_rain " class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="storeFile">
                                    Store Data in DB
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            id="survey-core"
            class="container my-4">
            <div
                id="toolsform"
                class="accordion-area"
            >
                <div class="panel">
                    <div
                        id="headerOne"
                        class="panel-header"
                    >
                        <button
                            class="panel-link active collapsed"
                            data-toggle="collapse"
                            data-target="#collapseTree"
                        >
                        <b-spinner v-if="busy_convertion" label="Spinning"></b-spinner>
                            Step 3: {{ steps[2].title }}
                        </button>
                    </div>
                    <div
                        id="collapseTree"
                        class="collapse"
                        data-parent="#survey-core"
                    >
                        <div class="py-4 mx-4">
                            <h3>Convert Data</h3>
                                <b-alert show>
                                    For <b>Temperatura</b>, the unit should be <b>Celsius (ºC)</b>.<br>
                                    For <b>Presión</b>, the unit should be <b>hPa</b>. <br>
                                    For <b>Velocidad del viento</b>, the unit should be <b>m/s</b>. <br>
                                    For <b>Precipitación del viento</b>, the unit should be <b>mm</b>. <br>
                                </b-alert>
                                <p class="mt-3">Select the units present in the file for the following variables.</p>
                                <div class="row justify-content-center">
                                    <label class="control-label col-sm-3" style="color: black"><h5>Temperatura</h5>
                                    <b-form-select v-model="selectedUnitTemp" :options="unitTemp"></b-form-select>
                                    </label>
                                    <label class="control-label col-sm-3" style="color: black"><h5>Presión</h5>
                                    <b-form-select v-model="selectedUnitPres" :options="unitPres"></b-form-select>
                                    </label>
                                    <label class="control-label col-sm-3" style="color: black"><h5>Velocidad del viento</h5>
                                    <b-form-select v-model="selectedUnitWind" :options="unitWind"></b-form-select>
                                    </label>
                                    <label class="control-label col-sm-3" style="color: black"><h5>Precipitación</h5>
                                    <b-form-select v-model="selectedUnitRain" :options="unitRain"></b-form-select>
                                    </label>
                                </div>
                                <div style="text-align: center;">
                                   <button class="site-btn my-4" v-on:click="convertDataFtoC"><b-spinner v-if="busy_convert_temp" label="Spinning"></b-spinner>
                                        Convert °F to °C
                                    </button>
                                    <button class="site-btn my-4" v-on:click="convertDataInhgOrMmhgToHpa"><b-spinner v-if="busy_convert_pres" label="Spinning"></b-spinner>
                                        Convert inhg or mmhg to hpa
                                    </button>
                                    <button class="site-btn my-4" v-on:click="convertDatakmOrMToMs"><b-spinner v-if="busy_convert_wind" label="Spinning"></b-spinner>
                                        Convert km/h or mph to m/s
                                    </button>
                                    <button class="site-btn my-4" v-on:click="convertDataInchToMm"><b-spinner v-if="busy_convert_rain" label="Spinning"></b-spinner>
                                        Convert inch to mm
                                    </button>
                                </div>
                            <div class="row py-4 mx-4 justify-content-center">

                                <b-table sticky-header="600px" striped hover responsive :items="all_data"></b-table>
                                
                            </div>
                            <div style="text-align: center;">
                                <b-alert show variant="danger" v-if="error!=null">{{error}}</b-alert>
                                <b-alert show variant="success" v-if="success!=null">{{success}}</b-alert>
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" style="background: red;"v-on:click="cleanTable"><b-spinner v-if="busy_clean" label="Spinning"></b-spinner>
                                    Clean Table
                                </button>
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="storeFile"><b-spinner v-if="busy_store" label="Spinning"></b-spinner>
                                    Store Data in DB
                                </button>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

    </div>
</template>

<script>

const rootUrl = process.env.MIX_APP_URL

    export default {
        data () {
            return {
                currentStep: 1,
                steps: [
                    {
                        'id': 1,
                        'title': "Upload the file",
                    },
                    {
                        'id': 2,
                        'title': "Check value and units",
                    },
                    {
                        'id': 3,
                        'title': "Convert data",
                    }
                ],
                unitTemp : [
                    { value: 'C', text: 'Celsius (ºC)' },
                    { value: 'F', text: 'Farhenheit (ºF)' }
                    ],
                unitPres : [
                    { value: 'hpa', text: 'hPa' },
                    { value: 'inhg', text: 'inhg' },
                    { value: 'mmhg', text: 'mmhg' }
                    ],
                unitWind : [
                    { value: 'm/s', text: 'm/s' },
                    { value: 'km/h', text: 'km/h' },
                    { value: 'mph', text: 'mph' }
                    ],
                unitRain : [
                    { value: 'mm', text: 'mm' },
                    { value: 'inch', text: 'inch' }
                ],
                stations : [],
                selectedStation: [],
                selectedUnitTemp: 'C',
                selectedUnitPres: 'hpa',
                selectedUnitWind: 'm/s',
                selectedUnitRain: 'mm',
                file: null,
                items: null,
                total_rows: null,
                busy: false,
                busy_convertion: false,
                busy_convert_temp: false,
                busy_convert_pres: false,
                busy_convert_wind: false,
                busy_convert_rain: false,
                busy_store: false,
                busy_clean: false,
                error_data: null,
                all_data: null,
                success: null,
                error: null,
                error_temp:false,
                error_press:false,
                error_wind:false,
                error_rain:false

            }
        },
        props:{ 
            bgColor: {
                type: String, 
                default: 'red'
            }
        },
        mounted () {

            axios.get('api/stations').then((response) => {
                this.stations = response.data;
            })
        },
        computed:{
            tempIntBackColor() {
                return {
                    "color": this.bgColor,
                };
            

            }
        },


        methods: {
            nextToForm: function (message) {
                if(message=='uploadfile') {
                    this.currentStep = 2;
                    $('#collapseOne').collapse('hide');
                } else if(message=='units') {
                    this.currentStep = 3;
                    $('#collapseTwo').collapse('hide');
                } 
            },
            submit: function(event){
                this.busy = true;
                let formData = new FormData();
                formData.append('data-file', this.file);
                formData.append('selectedStation', this.selectedStation);
                formData.append('selectedUnitTemp', this.selectedUnitTemp);
                formData.append('selectedUnitPres', this.selectedUnitPres);
                formData.append('selectedUnitWind', this.selectedUnitWind);
                formData.append('selectedUnitRain', this.selectedUnitRain);

                axios.post(rootUrl+'/files', formData, {
                  }).then((result) => {
                    console.log(result.data.error_data.original.error_data);
                    this.total_rows = result.data.data_template.total;
                    this.items = result.data.data_template.data;
                    this.error_data = result.data.error_data.original.error_data;
                    this.busy= false;
                    this.error_temp = result.data.error_data.original.error_temp;
                    this.error_press = result.data.error_data.original.error_press;
                    this.error_wind = result.data.error_data.original.error_wind;
                    this.error_rain = result.data.error_data.original.error_rain;
                })

            },

            showAllData: function(){
                this.busy_convertion = true;
               
                axios.post(rootUrl+'/all_data', {
                  }).then((result) => {
                    console.log(result);
                    this.all_data = result.data.data;
                    this.busy_convertion= false;
                })

            },
            convertDataFtoC: function(){
                this.busy_convert_temp= true;
                axios({
                    method: 'post',
                    url: "/convertDataFtoC",
                    data: {
                        temp_unit: this.selectedUnitTemp,
                       
                    }
                })
                .then((result) => {
                    console.log(result);
                    this.all_data = result.data.data;
                    this.busy_convert_temp= false;
                    
                }, (error) => {
                    this.busy_convert_temp= false;
                    console.log(error);
                });          

            },
            convertDataInhgOrMmhgToHpa: function(){
                this.busy_convert_pres= true;
                axios({
                    method: 'post',
                    url: "/convertDataInhgOrMmhgToHpa",
                    data: {
                        pression_unit: this.selectedUnitPres,
                       
                    }
                })
                .then((result) => {
                    console.log(result);
                    this.all_data = result.data.data;
                    this.busy_convert_pres= false;
                    
                }, (error) => {
                    console.log(error);
                    this.busy_convert_pres= false;
                });          

            },

            convertDatakmOrMToMs: function(){
                this.busy_convert_wind= true;
                axios({
                    method: 'post',
                    url: "/convertDatakmOrMToMs",
                    data: {
                        veloc_viento_unit: this.selectedUnitWind,
                       
                    }
                })
                .then((result) => {
                    console.log(result);
                    this.all_data = result.data.data;
                    this.busy_convert_wind= false;
                    
                }, (error) => {
                    console.log(error);
                    this.busy_convert_wind= false;
                });          

            },
            convertDataInchToMm: function(){
                this.busy_convert_rain= true;
                axios({
                    method: 'post',
                    url: "/convertDataInchToMm",
                    data: {
                        precip_unit: this.selectedUnitRain,
                       
                    }
                })
                .then((result) => {
                    console.log(result);
                    this.all_data = result.data.data;
                    this.busy_convert_rain= false;
                    
                }, (error) => {
                    console.log(error);
                    this.busy_convert_rain= false;
                });          

            },

            storeFile: function(){
                this.busy_store= true;
                axios({
                    method: 'post',
                    url: "/storeFile",
                })
                .then((result) => {
                    console.log(result.data.success);
                    this.success = result.data.success
                    this.error = result.data.error
                    this.busy_store= false;
                    
                }, (error) => {
                    console.log(error);
                    this.error = error
                    this.busy_store= false;
                });          

            },

            cleanTable: function(){
                this.busy_clean= true;
                axios({
                    method: 'post',
                    url: "/cleanTable",
                })
                .then((result) => {
                    console.log(result);
                    this.busy_clean= false;
                    window.location.reload();
                    
                }, (error) => {
                    console.log(error);
                    this.busy_clean= false;
                });          

            },


        }
    }


</script>
