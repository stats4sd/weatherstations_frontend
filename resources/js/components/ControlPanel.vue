<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <h4><b>Modules</b></h4>
              
                <v-select  label="label" :options="modules" item-value="modules.value" :reduce="label => label.value" v-model="modulesSelected" multiple style="width:100%"></v-select>

             <h4  class="mt-3" v-if="modulesSelected.includes('daily_data')"><b>Stations</b></h4>
             <v-select v-if="modulesSelected.includes('daily_data')" :options="stations" :reduce="label => label.id" v-model="stationsSelected" multiple style="width:100%"></v-select>
              
                


            <h4 class="mt-3"><b>Start date</b></h4>
    
                <input class="form-control" type="date" v-model="startDate" style="width:100%">
            
            <h4 class="mt-3"><b>End date</b></h4>

                <input class="form-control" type="date" v-model="endDate" style="width:100%">
             
            <h4 class="mt-3"><b>Comunidad</b></h4>
                <v-select label="name" :options="comunidads" :reduce="name => name.id" v-model="comunidadsSelected" multiple style="width:100%"></v-select>
            <button class="btn btn-primary mt-5" v-on:click="submit" style="width:100%">Submit</button>
        
        </div>
    </div>
</template>

<script>

const rootUrl = ''

    export default {
        data: function(){
            return{

                startDate:null,
                endDate:null,
                comunidadsSelected:[],
                modulesSelected:[],
                weather:[],
                stationsSelected:[],
                pachagrama:[],
           
            }

        },
        props: ['comunidads', 'modules', 'stations'],
        watch: {
            modulesSelected() {
                this.$emit('update:modulesSelected', this.modulesSelected)
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
            }
        },
        methods: {
            submit: function (event) {
                axios({
                    method: 'post',
                    url: rootUrl+"/show",
                    data: {
                        comunidadsSelected: this.comunidadsSelected,
                        modulesSelected: this.modulesSelected,
                        startDate: this.startDate,
                        endDate: this.endDate,
                        stationsSelected: this.stationsSelected,
                    }
                })
                .then((result) => {
                    this.weather = result.data.weather;
                    this.pachagrama = result.data.pachagrama;
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
