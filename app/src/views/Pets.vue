<template>
  <div>
    <h3 class="mb-3">Pets Cadastrados</h3>
    <PetList :pets="pets" :enable-edit="true"/>
  </div>
</template>

<script>
import PetList from "@/components/pet/PetList.vue";
import petAPI from "@/api/pet.js";

export default {
  components: {
    PetList
  },
  data() {
    return {
      pets: []
    };
  },
  beforeMount() {
    this.loadPets();
  },
  methods: {
    loadPets() {
      petAPI.all().then(pets => {
        this.pets = pets;
      });
    }
  }
};
</script>