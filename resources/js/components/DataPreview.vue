<template>
	 <div class="row">
        <div class="col-sm-4 mb-5">
          <div class="card">
      
            <div class="container mt-5">
              
              
	<control-panel :comunidads="comunidads" :comunidadsSelected.sync="comunidadsSelected" :startDate.sync="startDate" :endDate.sync="endDate" :modules.sync="modules" :modulesSelected.sync="modulesSelected"></control-panel>
              

              

            </div>
          </div>
        </div>

        <div class="col-sm-8 mb-5">


	<tables :weather-daily="weatherDaily"></tables>
       

		    </div>



        </div>
      </div>
</template>
<script type="text/javascript">
export default {
        data(){
            return{
                modules:['Información meteorológica', 'Información de Pachagrama (agroclimático)', 'Manejo de la parcela', 'Información de parcelas', 'Suelos', 'Plagas'],
                startDate:null,
                endDate:null,
                weatherDaily:[],
                pachagrama:[],
                comunidads:[],
                comunidadsSelected:[],
                modulesSelected:[]

            }

        },
        mounted () {

            axios.get('api/comunidads').then((response) => {
                this.comunidads = response.data;
                console.log(response.data);
            }),
            axios.get('api/pachagrama').then((response) => {
                  
                this.pachagrama = response.data.data;
            })
        },
         watch: {
            comunidad() {
                console.log(this.comunidad);
            }
        },
       
    }

 </script>