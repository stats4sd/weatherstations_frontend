<template>
	 <div class="row">
        <div class="col-sm-4 mb-5">
          <div class="card">
      
            <div class="container mt-5">
              
              
	<control-panel :comunidads="comunidads" :comunidadsSelected.sync="comunidadsSelected" :startDate.sync="startDate" :endDate.sync="endDate"></control-panel>
              

              

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
                comunidads:['comunidad1', 'comunidad2'],
                comunidadsSelected:[],
                modulesSelected:[]

            }

        },
        mounted () {

            axios.get('api/weatherDaily').then((response) => {
                this.weatherDaily = response.data.data;
                console.log(this.weatherDaily);
            }),
            axios.get('api/pachagrama').then((response) => {
                  console.log(response.data.data);
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