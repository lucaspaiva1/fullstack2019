<template>
  <div
    class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm"
  >
    <h5 class="my-0 mr-md-auto font-weight-normal">Abrigo da Monza</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <router-link class="p-2 text-dark" :to="{name: 'pets'}">Meus Pets</router-link>
      <router-link class="p-2 text-dark" :to="{name: 'pets-adoption'}">Adoção</router-link>
      <router-link class="p-2 text-dark" :to="{name: 'pet-create'}">Cadastrar</router-link>
    </nav>
  </div>
</template>