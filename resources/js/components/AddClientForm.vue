<template>
    <div class="container">        
        <form v-on:submit.prevent>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" v-model="client.name">
            </div>  
            <div class="form-group">
                <label>Surname</label>
                <input type="text" class="form-control" v-model="client.surname">
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" v-model="client.city"> 
            </div>
            <button class="btn btn-info" v-on:click="addClient()">Check Console</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            client: {
                name: '',
                surname: '',
                city: '',
            },
            error: {
                name: '',
                surname: '',
                city: '',
            },
        }
    },
    methods: {
        addClient(){
            axios.post('/clients', this.client)
             .then(response => {
                 console.log(response);
             })
             .catch(error =>{
                 console.log(error);
             })
             this.$emit('refreshAdd')
        }
    }
}
</script>

<style scoped>
    .container{
        margin: 10px;
    }
    input{
        width: 25%;
    }
</style>