<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <h4><b>Modules</b></h4>
              
            <v-select  label="label" :options="modules" item-value="modules.value" :reduce="label => label.value" v-model="modulesSelected" multiple style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('daily_data')"><b>Stations</b></h4>
            <v-select v-if="modulesSelected.includes('daily_data')" :options="stations" :reduce="label => label.id" v-model="stationsSelected" multiple style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('parcelas')"><b>Parcelas</b></h4>
            <v-select v-if="modulesSelected.includes('parcelas')" :options="parcelasModules" :reduce="label => label.value" v-model="parcelasModulesSelected" multiple style="width:100%"></v-select>

            <h4  class="mt-3" v-if="modulesSelected.includes('cultivos')"><b>Cultivos</b></h4>
            <v-select v-if="modulesSelected.includes('cultivos')" :options="cultivosModules" :reduce="label => label.value" v-model="cultivosModulesSelected" multiple style="width:100%"></v-select>
              
            <h4 class="mt-3"><b>Start date</b></h4>
    
                <input class="form-control" type="date" v-model="startDate" style="width:100%">
            
            <h4 class="mt-3"><b>End date</b></h4>

                <input class="form-control" type="date" v-model="endDate" style="width:100%">

            <h4 class="mt-3"><b>Departamento</b></h4>
                <v-select label="name" :options="departamentos" :reduce="name => name.id" v-model="departamentosSelected" multiple style="width:100%"></v-select>

            <h4 class="mt-3"><b>Municipio</b></h4>
                <v-select label="name" :options="municipiosFilter" :reduce="name => name.id" v-model="municipiosSelected" multiple style="width:100%"></v-select>

            <h4 class="mt-3"><b>Comunidad</b></h4>
                <v-select label="name" :options="comunidadsFilter" :reduce="name => name.id" v-model="comunidadsSelected" multiple style="width:100%"></v-select>
            <button class="btn btn-primary mt-5" v-on:click="submit" style="width:100%">Submit</button>
        
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
                pachagrama:[],
                municipiosFilter:[],
                comunidadsFilter:[],
                parcelas:[],
                suelos: [],
                manejo_parcela: [],
                plagas_y_enfermedades: [],
                produccion: [],
                fenologia: [],
           
            }

        },
        props: ['departamentos','municipios','comunidads', 'modules', 'parcelasModules','cultivosModules', 'stations'],
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
            pachagrama() {
                this.$emit('update:pachagrama', this.pachagrama)
            },
            departamentosSelected() {
       
                this.municipiosFilter = this.municipios.filter(municipio => this.departamentosSelected.includes(municipio.departamento_id));
            },
            municipiosSelected() {
       
                this.comunidadsFilter = this.comunidads.filter(comunidad => this.municipiosSelected.includes(comunidad.municipio_id));
            }

        },

     
        methods: {
            submit: function (event) {
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
                    }
                })
                .then((result) => {
                    this.weather = result.data.weather;
                    this.pachagrama = result.data.pachagrama;
                    this.parcelas = result.data.parcelas;
                    this.suelos = result.data.suelos;
                    this.manejo_parcela = result.data.manejo_parcela;
                    this.plagas_y_enfermedades = result.data.plagas_y_enfermedades;
                    this.produccion = result.data.produccion;
                    this.fenologia = result.data.fenologia;
                    console.log(result.data);

                }, (error) => {
                    console.log(error);
                });          
            }
        } 
    }

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>
