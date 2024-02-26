<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6">
        <v-card>
          <v-card-title class="text-h5 text-center">Inicio de Sesión</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="loginUser">
              <v-text-field v-model="email" label="Correo Electrónico" type="email" required></v-text-field>
              <v-text-field v-model="password" label="Contraseña" type="password" required></v-text-field>

              <v-btn type="submit" color="primary" block>
                Iniciar Sesión
              </v-btn>
            </v-form>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    loginUser() {
      // Implementa la lógica para iniciar sesión aquí
      console.log("Iniciando sesión...");
      console.log("Correo Electrónico:", this.email);
      console.log("Contraseña:", this.password);
    },
  },
};
</script>

<style scoped>
/* Estilos específicos del componente, si es necesario */
</style>
