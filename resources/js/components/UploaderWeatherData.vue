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
                            <div class="row img-block py-4 mx-4 justify-content-center">
                                <b-form-file multiple :file-name-formatter="formatNames"></b-form-file>
                               
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo"  v-on:click="nextToForm('uploadfile')">
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
                            Step 2: {{ steps[1].title }}
                        </button>
                    </div>
                    <div
                        id="collapseTwo"
                        class="collapse"
                        data-parent="#survey-core"
                    >
                        <div class="py-4 mx-4">
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
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree" v-on:click="nextToForm('units')">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="survey-modules"
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
                            data-target="#collapseThree"
                        >
                            Step 3: {{ steps[2].title }}
                        </button>
                    </div>
                    <div
                        id="collapseThree"
                        class="collapse"
                        data-parent="#survey-modules"
                    >
                        <div class="py-4 mx-4">
                            <h3>Add optional modules</h3>
                            <p class="mt-3">Selection options below to begin</p>
                            <div class="row py-4 mx-4 justify-content-center">
                                <div
                                    v-for="mod in modulesFilter"
                                    :key="mod.id"
                                    class="col-md-4"
                                >
                                
                                    <input
                                        :id="`${mod.id}_check`"
                                        v-model="selectedModules"
                                        type="checkbox"
                                        :value="mod.id"
                                        class="d-none"
                                    >
                                    <!-- <div class="card"> -->
                                        
                                        <label
                                            class="checkdiv"
                                            :for="`${mod.id}_check`"
                                            :class="{ 'selected' : selectedModules.includes(mod.id)}"
                                        >
                                            <img
                                                :src="'storage/'+mod.logo"
                                            >
                                        </label>
                                     
                                
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="collapse" href="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour" v-on:click="nextToForm('convertUnits')">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            id="survey-review"
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
                            data-target="#collapseFour"
                        >
                            Step 4: {{ steps[3].title }}
                        </button>
                    </div>
                    <div
                        id="collapseFour"
                        class="collapse"
                        data-parent="#survey-review"
                    >
                        <div class="py-4 mx-4">
                            <h3>Preview and finish</h3>
                            <p class="mt-3"></p>
                            
                            <div class="row py-4 mx-4 justify-content-center">
                           
                            </div>

                            <div style="text-align: center;">
                                <button class="site-btn my-4" data-toggle="" href=""
                                    aria-expanded="false" aria-controls="" v-on:click='submit'>
                                    Finish
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
                        'title': "Select Units",
                    },
                    {
                        'id': 3,
                        'title': "Convert data",
                    },
                    {
                        'id': 4,
                        'title': "Preview and Finish",
                    },
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
                selectedUnitTemp: 'C',
                selectedUnitPres: 'hpa',
                selectedUnitWind: 'm/s',
                selectedUnitRain: 'mm',

                
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
                } else if(message=='convertUnits') {
                    this.currentStep = 4;
                    $('#collapseThree').collapse('hide');
                }
            },
            submit: function(event){
                axios({
                    method: 'post',
                    url: rootUrl+"/survey-builder-selected",
                    data: {
                        selectedThemes: this.selectedThemes,
                        selectedCore: this.selectedCore,
                        selectedModules: this.selectedModules,
                        formTitle: this.formTitle,
                        formId: this.formId,
                        defaultLanguage: this.defaultLanguage,
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
