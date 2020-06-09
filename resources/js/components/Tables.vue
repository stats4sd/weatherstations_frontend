<template>

    <div class="container">
        <div class="justify-content-center">

            <div class="container mt-5"> 
 
                 <b-table striped hover responsive :items="data" ></b-table>
            </div>
 
        </div>
            
           
    </div>
</template>

<script>
export default {
        props: ['data']
        }

</script>
