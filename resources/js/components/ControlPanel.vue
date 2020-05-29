<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <h4><b>Modules</b></h4>
              
                <v-select  :options="modules" v-model="modulesSelected" multiple style="width:100%">
                </v-select>

            <h4><b>Start date</b></h4>
                <div class="form-group">

            
                  <input class="form-control" type="date" value="2011-08-19" v-model="startDate" style="width:100%">
            
                </div>
            <h4><b>End date</b></h4>
                <div class="form-group">

              
                <input class="form-control" type="date" value="2011-08-19" v-model="endDate" style="width:100%">
             
                </div>
            <h4><b>Location</b></h4>
                <v-select :options="comunidads" v-model="comunidadsSelected" multiple style="width:100%">
                   
                </v-select>
        
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                modules:['Información meteorológica', 'Información de Pachagrama (agroclimático)', 'Manejo de la parcela', 'Información de parcelas', 'Suelos', 'Plagas'],
                startDate:null,
                endDate:null,
                comunidadsSelected:[],
                modulesSelected:[]
            }

        },
        props: ['comunidads'],
        watch: {
            comunidadsSelected() {
                this.$emit('update:comunidadsSelected', this.comunidadsSelected)
            },
            startDate() {
                this.$emit('update:startDate', this.startDate)
            },
            endDate() {
                this.$emit('update:endDate', this.endDate)
            }
        },
       
       
    }
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>
