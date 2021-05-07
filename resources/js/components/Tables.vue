<template>

        <div class="justify-content-center">
            <div class="mt-5"> 
 
                <b-table head-variant="light" striped sticky-header="500px" hover responsive :items="data" :fields="fields" :sort-by.sync="sortBy"></b-table>

            </div>   
    	</div>

</template>

<script>
export default {
        props: ['data', 'fields', 'sortBy']
        }

</script>
