<template>
<v-container fluid grid-list-xl>
    <v-layout row justify-center>
      
      <v-flex xs12 md3>
        <v-card >
          <v-card-text>
              <h3 class="headline mb-0 text-md-center">Eliminar usuario</h3>
              <v-form  @submit.prevent="EliminarUsuario">
                <!--Consulto a la tabla carrera mediante un select-->
                <v-select :items="users" 
                item-text="id" 
                item-value="id" 
                single-line
                v-model="form.id"
                label="id"></v-select>
                <div class="text-md-center">
                <!--Envio los datos del formulario-->
                <v-btn type="submit" color="primary">Eliminar Usuario</v-btn>
                </div>

            </v-form >
          </v-card-text>
        </v-card>
      </v-flex>
     
    </v-layout>
</v-container>
</template>

<script>
export default {
    data () {
      return {
        form: {
            id: null,
        },
        users:[],
      }
    },
    created:
      function () {
        this.getUsuarios();
      
    },
    methods:{
        EliminarUsuario(){
            console.log(this.form);
            //User.signup(this.form);
            axios.put('api/usuario/{id}',this.form)
            this.form = false;
        },
        getUsuarios(){
          axios.get('/api/usuario')
            .then((res) => {
              console.log(res)
              this.users=res.data
            })
            .catch((error) => {
              console.log(res) 
            })

        },
        form(item){
          this.from=item

        },

    }
}
</script>

<style>

</style>