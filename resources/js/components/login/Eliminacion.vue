<template>
<v-container fluid grid-list-xl>
    <v-layout row justify-center>
      
      <v-flex xs12 md3>
        <v-card >
          <v-card-text>
              <h3 class="headline mb-0 text-md-center">Eliminar Usuario</h3>
              <v-form  @submit.prevent="EliminarUsuario">
                <!--Consulto a la tabla carrera mediante un select-->
                <v-select :items="users" 
                item-text="name" 
                item-value="id" 
                single-line
                v-model="form.id"
                label="Name"></v-select>
                <div class="text-md-center"> 
                <!--Envio los datos del formulario--> 
                <v-btn type="submit" color="primary">Eliminar usuario</v-btn>
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
            id: null
        },
        users:[]
      }
    },
    created:
      function () {
        this.initialize();
      
    },
    methods:{

      initialize(){
          axios.request({
            url: `/api/usuario`,
            method: 'get',
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`
            }
          }).then((res) => {
              this.users = res.data.data;
              console.log('respuesta',res.data.data)
            })
            .catch((error) => {
              User.logout()
              this.$bus.$emit('logged', 'User logged')
              this.$router.push({ path: 'lista-ambientes' })
            })
      },


        EliminarUsuario(){
            axios
            .request({
              url: `/api/usuario/${this.form.id}`,
              method: "delete",
              headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`
              }
            })
            .then((res) => {
              this.$router.push({ path: 'lista-usuarios' })
            })
              .catch((error) => {
                alert('Error!, no se puede eliminar');
            })  
        },
        
    }
    
}
</script>

<style>

</style>