<template>
<v-container fluid grid-list-xl>
    <v-layout row justify-center>
      
      <v-flex xs12 md3>
        <v-card >
          <v-card-text>
              <h3 class="headline mb-0 text-md-center">Registro de Laboratorios</h3>
              <v-form  @submit.prevent="registrarAmbiente">
                 <v-text-field
                v-model="form.nombre"
                label="Laboratorio"
                required
                ></v-text-field>
                <span class="red--text" v-if="errors.nombre">{{errors.nombre[0]}}</span>
                <!--Consulto a la tabla carrera mediante un select-->
                <v-select :items="carreras" 
                item-text="nombre" 
                item-value="codigo" 
                single-line
                v-model="form.direccion"
                label="Carrera"></v-select>
               <!--Consulto a la tabla color mediante un select-->
                <v-select :items="colors" 
                item-text="nombre" 
                item-value="codigo" 
                single-line
                v-model="form.color"
                label="Color"></v-select>
                <div class="text-md-center">
                <!--Envio los datos del formulario-->
                <v-btn type="submit" color="primary">Registrar Laboratorio</v-btn>
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
            nombre: null,
            direccion: null,
            color: null
        },
        errors:{},
        carreras:[],
        colors:[]
      }
    },
    created:
      function () {
        this.getColors();
        this.getCarreras();
      
    },
    methods:{
        registrarAmbiente(){
            console.log(this.form);
            //User.signup(this.form);
            axios.post('/api/ambiente',this.form)
            .then((res) => {
              this.$router.push({ path: 'lista-ambientes' })  
            })
            .catch((error) => {
              this.errors = error.response.data.errors
            })

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
        }

    }
}
</script>

<style>

</style>