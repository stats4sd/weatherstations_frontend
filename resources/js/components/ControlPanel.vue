<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <h4><b>Select the modules</b></h4>
              
            <v-select  label="label" :options="modules" item-value="modules.value" :reduce="label => label.value" v-model="modulesSelected" multiple style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('daily_data')"><b>From which station do you want to have data?</b></h4>
            <v-select v-if="modulesSelected.includes('daily_data')" :options="stations" :reduce="label => label.id" v-model="stationsSelected" multiple style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('daily_data')"><b>Select the aggregation for the weather data</b></h4>
            <v-select v-if="modulesSelected.includes('daily_data')" :options="aggregations" :reduce="label => label.value" v-model="aggregationSelected" style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('parcelas')"><b>What are you interested about plots?</b></h4>
            <v-select v-if="modulesSelected.includes('parcelas')" :options="parcelasModules" :reduce="label => label.value" v-model="parcelasModulesSelected" multiple style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('cultivos')"><b>What are you interested about crops?</b></h4>
            <v-select v-if="modulesSelected.includes('cultivos')" :options="cultivosModules" :reduce="label => label.value" v-model="cultivosModulesSelected" multiple style="width:100%"></v-select>
              
            <h4 class="mt-3 row"><b>Start date</b></h4>
    
                <input class="form-control" type="date" v-model="startDate" style="width:100%">
            
            <h4 class="mt-3"><b>End date</b></h4>

                <input class="form-control" type="date" v-model="endDate" style="width:100%">

            <h4 class="mt-3"><b>Departamento</b></h4>
                <v-select label="name" :options="departamentos" :reduce="name => name.id" v-model="departamentosSelected" multiple style="width:100%"></v-select>

            <h4 class="mt-3"><b>Municipio</b></h4>
                <v-select label="name" :options="municipiosFilter" :reduce="name => name.id" v-model="municipiosSelected" multiple style="width:100%"></v-select>

            <h4 class="mt-3"><b>Comunidad</b></h4>
                <v-select label="name" :options="comunidadsFilter" :reduce="name => name.id" v-model="comunidadsSelected" multiple style="width:100%"></v-select>
            <button class="site-btn mt-5" v-on:click="submit" style="width:100%">Submit</button>
        
        </div>
    </div>
</template>

<script>


    export default {
        data: function(){
            return{

                startDate:null,
                endDate:null,
                departamentosSelected:[],
                municipiosSelected:[],
                comunidadsSelected:[],
                modulesSelected:[],
                parcelasModulesSelected:[],
                cultivosModulesSelected:[],
                weather:[],
                stationsSelected:[],
                aggregationSelected:[],
                municipiosFilter:[],
                comunidadsFilter:[],
                parcelas:[],
                suelos: [],
                manejo_parcelas: [],
                plagas_y_enfermedades: [],
                rendimentos: [],
                fenologia: [],
                parcelasData:[],
           
            }

        },
        props: ['departamentos','municipios','comunidads', 'modules','aggregations', 'parcelasModules','cultivosModules', 'stations', 'showTable'],
        watch: {
            modulesSelected() {
                this.$emit('update:modulesSelected', this.modulesSelected)
            },
            parcelasModulesSelected() {
                this.$emit('update:parcelasModulesSelected', this.parcelasModulesSelected)
            },
            cultivosModulesSelected() {
                this.$emit('update:cultivosModulesSelected', this.cultivosModulesSelected)
            },
            comunidadsSelected() {
                this.$emit('update:comunidadsSelected', this.comunidadsSelected)
            },
            startDate() {
                this.$emit('update:startDate', this.startDate)
            },
            endDate() {
                this.$emit('update:endDate', this.endDate)
            },
            weather() {
                this.$emit('update:weather', this.weather)
            },
            stationsSelected() {
                this.$emit('update:stationsSelected', this.stationsSelected)
            },
            aggregationSelected() {
                this.$emit('update:aggregationSelected', this.aggregationSelected)
            },
            departamentosSelected() {
       
                this.municipiosFilter = this.municipios.filter(municipio => this.departamentosSelected.includes(municipio.departamento_id));
            },
            municipiosSelected() {
       
                this.comunidadsFilter = this.comunidads.filter(comunidad => this.municipiosSelected.includes(comunidad.municipio_id));
            },
            suelos() {
                this.$emit('update:suelos', this.suelos);
            },
            manejo_parcelas(){
                this.$emit('update:manejo_parcelas', this.manejo_parcelas);
            },
            plagas_y_enfermedades(){
                this.$emit('update:plagas_y_enfermedades', this.plagas_y_enfermedades);
            },
            rendimentos(){
                this.$emit('update:rendimentos', this.rendimentos);
            },
            fenologia(){
                this.$emit('update:fenologia', this.fenologia);
            },
            parcelasData(){
                this.$emit('update:parcelasData', this.parcelasData);
            },
            showTable(){
                this.$emit('update:showTable', this.showTable);
            }

        },

     
        methods: {
            submit: function (event) {
                this.showTable=true
                axios({
                    method: 'post',
                    url: "/show",
                    data: {
                        comunidadsSelected: this.comunidadsSelected,
                        modulesSelected: this.modulesSelected,
                        startDate: this.startDate,
                        endDate: this.endDate,
                        stationsSelected: this.stationsSelected,
                        parcelasModulesSelected: this.parcelasModulesSelected,
                        cultivosModulesSelected: this.cultivosModulesSelected,
                        aggregationSelected: this.aggregationSelected,
                    }
                })
                .then((result) => {
                    this.weather = result.data.weather;
                    this.parcelasData = result.data.parcelas;
                    this.suelos = result.data.suelos;
                    this.manejo_parcelas = result.data.manejo_parcelas;
                    this.plagas_y_enfermedades = result.data.plagas_y_enfermedades;
                    this.rendimentos = result.data.rendimentos;
                    this.fenologia = result.data.fenologia;
                
                }, (error) => {
                    console.log(error);
                });          
            }
        } 
    }

</script>
