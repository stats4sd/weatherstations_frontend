<template>

        <div class="justify-content-center">
            <div class="mt-5"> 
 
                 <b-table striped hover responsive :items="data" ></b-table>
            </div>   
    	</div>

</template>

<script>
export default {
        props: ['data']
        }

</script>
