<template>
     <v-card class="mx-auto">

      <v-container
        fluid
        grid-list-lg
      >
        <v-layout row wrap>
          <v-flex xs12 md3 v-for="ambiente in listaAmbientes" :key="ambiente.id">
            <v-card :color="ambiente.color" class="white--text" >
              <v-card-title primary-title>
                <div>
                  <div class="headline">
                    {{ ambiente.nombre }}
                    </div>
                  <span>{{ ambiente.direccion }}</span>
                </div>
              </v-card-title>
              <v-divider ></v-divider>
              <v-card-actions>
                <v-btn outline @click="verReserva(ambiente)" flat dark>Ver Reservas</v-btn>
                
                <v-btn outline @click="editarAmbiente(ambiente)" color="white" class="ml-4"  v-if="loggin">
                   Editar
                  </v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>

        </v-layout>
      </v-container>
      <v-card-text v-if="loggin">
            <v-btn
              absolute
              dark
              fab
              bottom
              right
              color="pink"
              @click="nuevoAmbiente()"
            >
              <v-icon>add</v-icon>
            </v-btn>
          </v-card-text>



      <v-dialog v-model="dialogEdit" persistent max-width="400px">
      <v-card>
        <v-card-title 
        v-bind:class="[classEditModal.headline, classEditModal.colorFondo, classEditModal.colorText]">
          <span class="headline">Editar Laboratorio</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md v-if="editAmbiente">
            <v-layout wrap>

              <v-flex xs12>
                <v-text-field label="Laboratorio*" required v-model="editAmbiente.nombre"></v-text-field>
              </v-flex>
              <v-flex xs12>
                <v-select :items="carreras" 
                item-text="nombre" 
                item-value="codigo" 
                single-line
                v-model="editAmbiente.direccion"
                label="Carrera*"></v-select>
              </v-flex>
              <v-flex xs12>
                <v-select :items="colors" 
                item-text="nombre" 
                item-value="codigo" 
                single-line
                v-model="editAmbiente.color"
                label="Color*"></v-select>
              </v-flex>


            </v-layout>
          </v-container>

        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click="dialogEdit = false">Cerrar</v-btn>
          <v-btn color="blue darken-1" flat @click="actualizarAmbiente()">Guardar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    </v-card>
</template>

<script>
export default {
  data: function () {
    return {
      loggin: false,
      listaAmbientes: null,
      dialogEdit: false,
      editAmbiente: null,
      classEditModal:{
        headline: 'headline',
        colorFondo: 'blue',
        colorText: 'white--text'
      }
    }
  },
  created: function () {
    this.getColors();
    this.getCarreras();
       this.obtenerAmbientes();
       this.$bus.$emit('cambiarTextoTitulo', 'Lista de Laboratorios')
       if(User.isAdministrator()){
          this.loggin = true
      }else{
           this.loggin = false
      }
  },
  methods:{
        obtenerAmbientes(){
            axios.get('/api/ambiente')
            .then((res) => {
              this.listaAmbientes = res.data.data;
              console.log(res.data.data)
            })
            .catch((error) => {
              this.errors = error.response.data.errors
            })
            
        },
        verReserva(ambiente){
          if(User.loggedIn()){
            localStorage.ambiente_id = ambiente.id
            this.$bus.$emit('cambiarTextoTitulo', ambiente.nombre)
            this.$router.push({ path: 'reserva' })  
          }else{
            this.$router.push({ path: 'login' })  
          }
          
        },
        getColors(){
            axios.get('/api/color')
            .then((res) => {
              console.log(res)
              this.colors=res.data
            })
            .catch((error) => {
              console.log(res) 
            })
        },
        getCarreras(){
            axios.get('/api/carrera')
            .then((res) => {
              console.log(res)
              this.carreras=res.data
            })
            .catch((error) => {
              console.log(res) 
            })
        },
        nuevoAmbiente(){
          this.$router.push({ path: 'registrar-ambiente' })  
        },

        editarAmbiente(ambiente){
          this.editAmbiente =  ambiente
          this.classEditModal.colorFondo = this.editAmbiente.color
          this.dialogEdit = true
        },
        actualizarAmbiente(){
          axios.put(`/api/ambiente/${this.editAmbiente.id}`,this.editAmbiente)
            .then((res) => {
              //User.resposeAfterLogin(res)
              this.obtenerAmbientes()
              this.dialogEdit = false
            })
            .catch((error) => {
              this.errors = error.response.data.errors
            })
        }
    }
}
</script>

<style>

</style>
