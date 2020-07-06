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
                            <p class="mt-3">Selection the file</p>
                            <div class="row mx-4 justify-content-center">
                                <label class="control-label col-sm-6" style="color: black"><h5>File</h5>
                                    <b-form-file  v-model="file" placeholder="Choose a file or drop it here..."></b-form-file>
                                </label>
                            </div>
                            <div class="row mx-4 justify-content-center">
                                <label class="control-label col-sm-6" style="color: black"><h5>Station</h5>
                                    <v-select :options="stations" :reduce="label => label.id" v-model="selectedStation"></v-select>
                                </label>
                            </div>
                            <h3>Select the units</h3>
                            <p class="mt-3">select units for the folllowing columns</p>
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
                                <b-alert show>There are rows {{total_rows}}</b-alert>

                                <b-table striped hover responsive :items="items"></b-table>
                                
                            </div>
                            <div class="row py-4 mx-4 justify-content-center" v-if="error_data!=null">
                                <b-alert show variant="danger">There are value not correct in the file. Please check the following date.</b-alert>

                                <b-table striped hover responsive :items="error_data"></b-table>
                                
                            </div>
                                
                              
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('units')" style="background: red;">
                                    Cancel
                                </button>
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('units')">
                                    Convert Data
                                </button>
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('units')">
                                    UploadData
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
                            <p class="mt-3">If you want covert data select which units do you want to convert.</p>
                            <div class="row py-4 mx-4 justify-content-center">
                                <b-alert show>There are rows {{total_rows}}</b-alert>

                                <b-table striped hover responsive :items="items"></b-table>
                                
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('convert_data')">
                                    UploadData
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
                busy_convertion:false,
                error_data: null,

                
            }
        },
        mounted () {

            axios.get('api/stations').then((response) => {
                this.stations = response.data;
            })
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
                    console.log(result);
                    this.total_rows = result.data.data_template.total;
                    this.items = result.data.data_template.data;
                    this.error_data = result.data.error_data;
                    this.busy= false;
                })

            }
        }
    }


</script>
