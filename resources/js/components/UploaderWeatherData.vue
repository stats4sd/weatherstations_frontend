<template>
    <div class="container">
        <progress-bar
            :current-step="currentStep"
            :steps="steps"
        />
        <div class="container my-4">
            <div class="accordion-area" role="tablist">
                <div class="panel">
                    <div class="panel-header">
                        <b-button
                            class="panel-link active"
                            :class="visible1 ? null : 'collapsed'"
                            :aria-expanded="visible1 ? 'true' : 'false'"
                            aria-controls="collapse-1"
                            @click="currentStep = 1"
                        >
                            Step 1: {{ steps[0].title }}
                        </b-button>
                    </div>
                    <b-collapse id="collapse-1" accordion="accordion" role="tabpanel" v-model="visible1">
                        <div class="py-4 mx-4">
                            <h3>Upload data file</h3>
                            <p>Upload the .csv or .txt file you extracted from the weatherstation. Make sure you upload the original, un-edited data file.</p>
                            <div class="row mx-4 justify-content-center">
                                <label class="control-label col-sm-6" style="color: black"><h5>Select the station</h5>
                                    <v-select @change="modalShow = !modalShow" :options="stations" label="label" v-model="selectedStation"></v-select>
                                </label>
                            </div>
                            <div class="row mx-4 justify-content-center">
                                <b-button @click="modalShow = !modalShow">Confirm Station</b-button>

                                    <b-modal  v-model="modalShow" title="Station" v-if="selectedStation" @ok="handleOk">
                                        <p class="my-4"><b>Station:</b> {{selectedStation.label}}</p>
                                        <p class="my-4"><b>Latitude:</b> {{selectedStation.latitude}}</p>
                                        <p class="my-4"><b>Longitude:</b> {{selectedStation.longitude}}</p>
                                        <p class="my-4"><b>Altitude:</b> {{selectedStation.altitude}}</p>
                                        <p class="my-4"><b>Type:</b> {{selectedStation.type}}</p>
                                        <p class="my-4"><b>Are you sure that {{selectedStation.label}} is the right Station?</b></p>
                                    </b-modal>
                            </div>
                                    
                    
                            <div class="row mx-4 justify-content-center" v-show="showUploadFile">
                                <label class="control-label col-sm-6" style="color: black"><h5>Select the file</h5>
                                    <b-form-file  v-model="file" placeholder="Choose a file or drop it here..."></b-form-file>
                                </label>
                            </div>
                            <div class="row mx-4 justify-content-center" v-show="showUploadFile">
                                <label class="control-label col-sm-6" style="color: black"><h5>Select the file Observations</h5>
                                    <b-form-file  v-model="filesObservation" placeholder="Choose a file or drop it here..."></b-form-file>
                                </label>
                            </div>
                            <h3>Select the units</h3>
                            <p class="mt-3">Select the units used in the file for the following variable types:</p>

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
                                <b-alert show varient="info">After you upload the file, you will have a chance to review the data values and confirm that these are the correct units before continuing.</b-alert>
                                <b-alert show variant="danger" v-if="uploadError!=null">{{uploadError}}</b-alert>
                                <button class="site-btn my-4" v-on:click="submit();" :disabled="busy_upload">
                                    <b-spinner small v-if="busy_upload" label="Spinning"></b-spinner> Upload File
                                </button>
                            </div>
                        </div>
                    </b-collapse>
                </div>
                <div class="panel">
                    <div class="panel-header">
                        <b-button
                            class="panel-link active"
                            :class="visible2 ? null : 'collapsed'"
                            :aria-expanded="visible2 ? 'true' : 'false'"
                            aria-controls="collapse-2"
                            @click="currentStep = 2"
                        >
                            Step 2: {{ steps[1].title }}
                        </b-button>
                    </div>
                    <b-collapse id="collapse-2" accordion="accordion" role="tabpanel" v-model="visible2">
                        <div class="py-4 mx-4">
                            <h3>Data Preview</h3>
                            <p class="mt-3">This is an example of your data.</p>
                            <b-alert show varient="success" >Please check that the columns you expect to be filled contain data, and that the values look sensible for the selected location, the time of year and the units chosen.</b-alert>
                            <b-alert varient="secondary" v-if="previewData!=null">There are {{total_rows}} rows</b-alert>
                           
                            <div class="d-flex mx-4 justify-content-center">

                                <b-table head-variant="light" striped sticky-header="500px" hover responsive :items="previewData" :fields="fields" style="max-height: 600px;">
                                    <template #cell(fecha)="data">
                                        {{ data.item.fecha_hora.substring(0,10) }} 
                                    </template>
                                    <template #cell(time)="data">
                                        {{ data.item.fecha_hora.substring(10) }} 
                                    </template>
                                    <template v-slot:cell(temperatura_interna)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(temperatura_externa)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(sensacion_termica)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(punto_rocio)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(wind_chill)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(hi_temp)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(low_temp)="data">
                                        {{ data.value }} {{ data.value!='' ? 'ºC' : ''}}
                                    </template>
                                    <template v-slot:cell(presion_relativa)="data">
                                        {{ data.value }} {{ data.value!='' ? 'hPa' : ''}}
                                    </template>
                                    <template v-slot:cell(presion_absoluta)="data">
                                        {{ data.value }} {{ data.value!='' ? 'hPa' : ''}}
                                    </template>
                                    <template v-slot:cell(velocidad_viento)="data">
                                        {{ data.value }} {{ data.value!='' ? 'm/s' : ''}}
                                    </template>
                                    <template v-slot:cell(rafaga)="data">
                                        {{ data.value }} {{ data.value!='' ? 'm/s' : ''}}
                                    </template>
                                    <template v-slot:cell(hi_speed)="data">
                                        {{ data.value }} {{ data.value!='' ? 'm/s' : ''}}
                                    </template>
                                    <template v-slot:cell(lluvia_hora)="data">
                                        {{ data.value }} {{ data.value!='' ? 'mm' : ''}}
                                    </template>
                                    <template v-slot:cell(lluvia_24_horas)="data">
                                        {{ data.value }} {{ data.value!='' ? 'mm' : ''}}
                                    </template>
                                    <template v-slot:cell(lluvia_semana)="data">
                                        {{ data.value }} {{ data.value!='' ? 'mm' : ''}}
                                    </template>
                                    <template v-slot:cell(lluvia_mes)="data">
                                        {{ data.value }} {{ data.value!='' ? 'mm' : ''}}
                                    </template>
                                    <template v-slot:cell(lluvia_total)="data">
                                        {{ data.value }} {{ data.value!='' ? 'mm' : ''}}
                                    </template>
                                    <template v-slot:cell(rain)="data">
                                        {{ data.value }} {{ data.value!='' ? 'mm' : ''}}
                                    </template>

                                </b-table>

                            </div>

                            <div class="row py-4 mx-4 justify-content-center" v-if="error_data!=null">
                                <b-alert show variant="danger" v-if="error_temp || error_press || error_wind||error_rain ">There are some values with the wrong units please check the following table and proceed with <b>Cancel</b> for uploading a new file or press <b>Store Data in DB</b> if the values are correct.</b-alert>

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
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="cleanTable" style="background: red;"><b-spinner small v-if="busy_clean" label="Spinning"></b-spinner> 
                                    Cancel
                                </button>
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="storeFile">
                                    <b-spinner small v-if="busy_store" label="Spinning"></b-spinner> 
                                    Store Data in DB
                                </button>

                            </div>
                        </div>
                    </b-collapse>
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
                        'title': "Check units and Store data",
                    }
                ],
                unitTemp : [
                    { value: 'ºC', text: 'Celsius (ºC)' },
                    { value: 'ºF', text: 'Farhenheit (ºF)' }
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
                selectedStation: null,
                selectedUnitTemp: 'ºC',
                selectedUnitPres: 'hpa',
                selectedUnitWind: 'm/s',
                selectedUnitRain: 'mm',
                file: null,
                filesObservation: null,
                previewData: null,
                total_rows: null,
                busy_upload: false,
                busy_store: false,
                busy_clean: false,
                error_data: null,
                success: null,
                error: null,
                error_temp:false,
                error_press:false,
                error_wind:false,
                error_rain:false,
                uploadError: null,
                uploader_id: null,
                showUploadFile:false,
                modalShow:false,
                fields:[
                {key: "fecha", stickyColumn: true, label:'Date', thStyle: { width: '200px'}},
                {key: "time", label:'Time', thStyle: { width: '200px'}},
                {key: "temperatura_externa", label:'Temp Out', thStyle: { width: '100px'}},
                {key: "hi_temp", label:'Hi Temp', thStyle: { width: '200px'}},
                {key: "low_temp", label:'Low Temp', thStyle: { width: '100px'}},
                {key: "humedad_externa", label:'Out Hum', thStyle: { width: '200px'}},
                {key: "punto_rocio", label:'Dew Pt.', thStyle: { width: '100px'}},
                {key: "velocidad_viento", label:'Wind Speed', thStyle: { width: '200px'}},
                {key: "direccion_del_viento", label:'Wind Dir', thStyle: { width: '100px'}},
                {key: "wind_run", label:'Wind Run', thStyle: { width: '200px'}},
                {key: "hi_speed", label:'Hi Speed', thStyle: { width: '100px'}},
                {key: "wind_chill", label:'Wind Chill', thStyle: { width: '200px'}},
                {key: "index_heat", label:'Heat Index', thStyle: { width: '100px'}},
                {key: "index_thw", label:'THW Index', thStyle: { width: '100px'}},
                {key: "index_thsw", label:'THSW Index', thStyle: { width: '100px'}},
                {key: "presion_relativa", label:'Bar', thStyle: { width: '100px'}},
                {key: "rain", label:'Rain', thStyle: { width: '100px'}},
                {key: "lluvia_hora", label:'Rain Rate', thStyle: { width: '100px'}},
                {key: "solar_rad", label:'Solar Rad.', thStyle: { width: '100px'}},
                {key: "solar_energy", label:'Solar Energy', thStyle: { width: '100px'}},
                {key: "radsolar_max", label:'Hi Solar Rad.', thStyle: { width: '100px'}},
                {key: "uv_index", label:'UV Index', thStyle: { width: '100px'}},
                {key: "uv_dose", label:'UV Dose', thStyle: { width: '100px'}},
                {key: "uv_max", label:'Hi UV', thStyle: { width: '100px'}},
                {key: "heat_days_d", label:'Heat D-D', thStyle: { width: '100px'}},
                {key: "cool_days_d", label:'Cool_D-D', thStyle: { width: '100px'}},
                {key: "temperatura_interna", label:'In Temp', thStyle: { width: '100px'}},
                {key: "humedad_interna", label:'In Hum', thStyle: { width: '100px'}},
                {key: "in_dew", label:'In Dew', thStyle: { width: '100px'}},
                {key: "in_heat", label:'In Heat', thStyle: { width: '100px'}},
                {key: "in_emc", label:'In EMC', thStyle: { width: '100px'}},
                {key: "in_air_density", label:'In Air Density', thStyle: { width: '100px'}},
                {key: "evapotran", label:'ET', thStyle: { width: '100px'}},
                {key: "soil_1_moist", label:'Soil 1 Moist.', thStyle: { width: '100px'}},
                {key: "soil_2_moist", label:'Soil 2 Moist.', thStyle: { width: '100px'}},
                {key: "soil_temp_1", label:'Soil Temp 1.', thStyle: { width: '100px'}},
                {key: "soil_temp_2", label:'Soil Temp 2.', thStyle: { width: '100px'}},
                {key: "soil_temp_3", label:'Soil Temp 3.', thStyle: { width: '100px'}},
                {key: "leaf_wet1", label:'Leaf Wet 1', thStyle: { width: '100px'}},
                {key: "leaf_wet2", label:'Leaf Wet 2', thStyle: { width: '100px'}},
                {key: "leaf_wet3", label:'Leaf Wet 3', thStyle: { width: '100px'}},
                {key: "wind_samp", label:'Wind Samp', thStyle: { width: '100px'}},
                {key: "wind_tx", label:'Wind Tx', thStyle: { width: '100px'}},
                {key: "iss_recept", label:'ISS Recept', thStyle: { width: '100px'}},
                {key: "intervalo", label:'Arc. Int.', thStyle: { width: '100px'}},
                ]
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
            },
            visible1: {
                get: function() { return this.currentStep === 1 },
                set: function(newValue) { if(newValue) this.currentStep = 1 }
            },
            visible2: {
                get: function() { return this.currentStep === 2 },
                set: function(newValue) { if(newValue) this.currentStep = 2 }
            },
            visible3: {
                get: function() { return this.currentStep === 3 },
                set: function(newValue) { if(newValue) this.currentStep = 3 }
            },
        },


        methods: {
            submit: function(event){

                //check form for errors
                this.uploadError = null;

                if(!this.file) {
                    this.uploadError = "Please choose a file to upload";
                    return;
                }

                if(!this.selectedStation) {
                    this.uploadError = "Please select the station this data came from";
                    return;
                }

                this.busy_upload = true;
                let formData = new FormData();
                formData.append('data-file', this.file);
                formData.append('data-filesObservation', this.filesObservation);
                formData.append('selectedStation', this.selectedStation.id);
                formData.append('selectedUnitTemp', this.selectedUnitTemp);
                formData.append('selectedUnitPres', this.selectedUnitPres);
                formData.append('selectedUnitWind', this.selectedUnitWind);
                formData.append('selectedUnitRain', this.selectedUnitRain);

                axios.post(rootUrl+'/files', formData, {}).then((result) => {

                    console.log(result)
                    this.total_rows = result.data.data_template.total;
                    this.previewData = result.data.data_template.data;
                    this.uploader_id = (this.previewData[0]['uploader_id']);


                    // this.error_data = result.data.error_data.original.error_data;
                    // this.error_temp = result.data.error_data.original.error_temp;
                    // this.error_press = result.data.error_data.original.error_press;
                    // this.error_wind = result.data.error_data.original.error_wind;
                    // this.error_rain = result.data.error_data.original.error_rain;
                     


                    this.currentStep = 2;
                })
                .catch((error) => {
                    this.busy_upload = false;
                    console.log(error);
                    if(error.response && error.response.hasOwnProperty('data')) {
                        this.uploadError = error.response.data.message;
                    }
                    else {
                        this.uploadError = "The file could not be uploaded. Please check it is in the correct format, or contact the site administrator for more information";
                    }
                })
                .then(() => {
                    this.busy_upload = false;
                })


            },

            storeFile: function(){
                this.busy_store= true;
                axios({
                    method: 'post',
                    url: "/storeFile/" + this.uploader_id,
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
                    url: "/cleanTable/"+ this.uploader_id ,
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
            handleOk: function(){
                 this.showUploadFile = true
            }
        }
    }


</script>
