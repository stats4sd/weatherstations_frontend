<template>
    <div class="container">
        <div class="row justify-content-center">
            
            <h4><b>Modules</b></h4>
              
                <v-select  :options="modules" v-model="modulesSelected" multiple style="width:100%"></v-select>

            <h4 class="mt-3"><b>Start date</b></h4>
    
                <input class="form-control" type="date" value="2011-08-19" v-model="startDate" style="width:100%">
            
            <h4 class="mt-3"><b>End date</b></h4>

                <input class="form-control" type="date" value="2011-08-19" v-model="endDate" style="width:100%">
             
            <h4 class="mt-3"><b>Location</b></h4>
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
                modulesSelected:[]
            }

        },
        props: ['comunidads', 'modules'],
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
                    }
                })
                         
            }
        }


       
       
    }
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>
