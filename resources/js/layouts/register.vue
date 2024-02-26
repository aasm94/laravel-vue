<template>
  <v-container>
    <v-row justify="center">
      <v-col cols="12" sm="8" md="6">
        <v-card>
          <v-card-title class="text-h5 text-center">Registro de Usuario</v-card-title>
          <v-card-text>
            <v-form @submit.prevent="registerUser">
              <v-text-field v-model="name" label="Nombre" required></v-text-field>
              <v-text-field v-model="email" label="Correo Electrónico" type="email" required></v-text-field>
              <v-text-field v-model="password" label="Contraseña" type="password" required></v-text-field>
              <v-text-field v-model="passwordConfirmation" label="Confirmar Contraseña" type="password" required></v-text-field>

              <v-btn type="submit" color="primary" block>
                Registrarse
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
      name: "",
      email: "",
      password: "",
      passwordConfirmation: "",
    };
  },
  methods: {
    registerUser() {
      // Aquí puedes implementar la lógica para registrar al usuario
      console.log("Registrando usuario...");
      console.log("Nombre:", this.name);
      console.log("Correo Electrónico:", this.email);
      console.log("Contraseña:", this.password);
      console.log("Confirmar Contraseña:", this.passwordConfirmation);
    },
  },
};
</script>

<style scoped>
/* Estilos específicos del componente, si es necesario */
</style>
