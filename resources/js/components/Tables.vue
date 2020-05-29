<template>

    <div class="container">
        <div class="justify-content-center">
            <div class="card">
            <div class="container mt-5">
              <h4><b>Table</b></h4>
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="weather in weatherDaily" :key="weather.id">
                            <td>{{weather.id}}</td>
                            <td>{{weather.fecha}}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
          </div>
        </div>
            
           
    </div>
</template>

<script>
export default {
        props: ['weatherDaily']

        }
</script>
