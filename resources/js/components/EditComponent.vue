<template>
    <modal name="EditModal" height="auto" :draggable="true"> 
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
                    <label>city</label>
                    <input type="text" class="form-control" v-model="client.city">
                </div>
                <button class="btn btn-primary" v-on:click="update(), hide()">Submit</button>
            </form>
        </modal>
</template>

<script>
import VModal from 'vue-js-modal';
Vue.use(VModal);

export default {
    data(){
        return {

            client: {
                id: '',
                name: '',
                surname: '',
                city: '',
            },
        }
    },

    methods:{
        show(id, clients){
            this.$modal.show('EditModal');
            var result = clients.find(client =>{
            return client.id === id;
            })
            this.client.id = id;
            this.client.name = result.name;
            this.client.surname = result.surname;
            this.client.city = result.city;
        },

        hide(){
            this.$modal.hide('EditModal');
            this.$emit('refresh');
        },

        update(){
            axios.put(`/clients/${this.client.id}`, this.client)
             .then(response => {
                console.log(response);
            })
        },
    },
}
</script>