<template>
  <div>
    <h3 class="mb-3">Pets para Adoção</h3>
    <hr />
    <PetFilter class="mb-3" @submit="filter"></PetFilter>
    <hr />
    <PetList :pets="filteredPets"></PetList>
  </div>
</template>

<script>
import PetFilter from "@/components/pet/PetFilter.vue";
import PetList from "@/components/pet/PetList.vue";
import petAPI from "@/api/pet.js";

export default {
  components: {
    PetList,
    PetFilter
  },
  data() {
    return {
      pets: [],
      filters: {}
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
    },
    filter(filters) {
      this.filters = {
        ...this.filters,
        ...filters
      };
    }
  },
  computed: {
    filteredPets() {
      return this.pets.filter(pet => {
        let showPet = [pet.died_at == null];
        for (let filter in this.filters) {
          if (this.filters[filter]) {
            showPet.push(pet[filter] == this.filters[filter]);
          }
        }
        return showPet.reduce((a, b) => a && b);
      });
    }
  }
};
</script>