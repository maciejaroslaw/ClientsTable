<template>
    <div class="container">
        <div class="row justify-content-center">
            <addClientComponent v-on:refreshAdd="getClients()"></addClientComponent>
            <div class="col-md-10 table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-bordered table-striped mb-0" :key="componentdID">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">City</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="client in clients" :key="client.id">
                            <th>{{client.id}}</th>
                            <th>{{client.name}}</th>
                            <th>{{client.surname}}</th>
                            <th>{{client.city}}</th>
                            <th><button class="btn btn-secondary" v-on:click="show(client.id, clients)">Edytuj!</button></th>
                            <th><deleteComponent ref="deleteButton" :id="client.id" v-on:refreshDelete="getClients()"></deleteComponent></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <editComponent v-bind:clients="clients" ref="editModal" v-on:refresh="getClients()"></editComponent>
    </div>
</template>

<script>
    import editComponent from './EditComponent';
    import deleteComponent from './DeleteClient';
    import addClientComponent from './AddClientForm';

    export default {
        components: {
            editComponent,
            deleteComponent,
            addClientComponent,
        },
        data (){
            return {
                componentdID: 0,
                clients: [],
                client_id: '',
                client_name: '',
                client_surname: '',
                client_city: '',
            }
        },
        methods: {
            getClients(){
                axios.get('/clients')
                 .then((response) => {
                     this.clients = response.data;
                     console.log()
                 })
                 .catch(function (error) {
                     console.log(error);
                 })
                 this.componentdID++;
            },
            show(client_id, clients){
                this.$refs.editModal.show(client_id, clients);
            },
            clickDelete(id){
                this.$refs.deleteButton.clickDelete(id);
            },
        },
        mounted(){
            this.getClients();
        }
    }
</script>

<style>
form{
    padding: 3%;
}
.my-custom-scrollbar {
position: relative;
height: 600px;
overflow: auto;
padding: 10px;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
