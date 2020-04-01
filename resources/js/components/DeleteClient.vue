<template>
    <div class="container">
        <button class="btn btn-danger" v-on:click="DeleteClient()">Delete</button>
    </div>    
</template>

<script>
export default {
    props: ['id'],
    methods: {
        DeleteClient(){
            axios.delete(`/clients/${this.id}`, this.clientID)
             .then(response => {
                 console.log(response);
             })
             .catch(error => {
                 console.log(error);
             });
            this.$emit('refreshDelete');
        },
    }
}
</script>
