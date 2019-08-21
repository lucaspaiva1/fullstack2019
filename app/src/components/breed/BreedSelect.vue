<template>
  <div>
    <label for="breed-select">Raça</label>
    <select class="custom-select" v-model="breed">
      <option :value="null" :disabled="!enableNull">{{ nullOption }}</option>
      <option v-for="breed of filteredBreeds" :key="breed.id" :value="breed.id">{{ breed.name }}</option>
    </select>
  </div>
</template>

<script>
import breedsAPI from "@/api/breed.js";

export default {
  props: ["initialBreed", "speciesId", "enableNull", "nullOptionText"],
  data() {
    return {
      breeds: [],
      breed: null
    };
  },
  beforeMount() {
    this.loadbreeds();
  },
  methods: {
    loadbreeds() {
      breedsAPI.all().then(breeds => {
        this.breeds = breeds;
      });
    }
  },
  computed: {
    filteredBreeds() {
      if (!this.speciesId) {
        return [];
      }
      return this.breeds.filter(breed => {
        return breed.species_id == this.speciesId;
      });
    },
    nullOption() {
      return this.nullOptionText || "Selecione uma raça";
    }
  },
  watch: {
    breed(value) {
      this.$emit("updated", value);
    },
    speciesId() {
      this.breed = null;
    },
    initialBreed(value) {
      this.breed = value;
    }
  }
};
</script>