<template>
  <div>
    <label for="species-select">Espécie</label>
    <select id="species-select" class="custom-select" v-model="selectedSpecies">
      <option :value="null" :disabled="!enableNull">{{ nullOption }}</option>
      <option v-for="species of speciesList" :key="species.id" :value="species.id">{{ species.name }}</option>
    </select>
  </div>
</template>

<script>
import speciesAPI from "@/api/species.js";

export default {
  props: ["initialSpecies", "enableNull", "nullOptionText"],
  data() {
    return {
      speciesList: [],
      selectedSpecies: null
    };
  },
  beforeMount() {
    this.loadSpecies();
  },
  computed: {
    nullOption() {
      return this.nullOptionText || "Selecione uma espécie";
    }
  },
  methods: {
    loadSpecies() {
      speciesAPI.all().then(species => {
        this.speciesList = species;
      });
    }
  },
  watch: {
    selectedSpecies(value) {
      this.$emit("updated", value);
    },
    initialSpecies(value) {
      this.selectedSpecies = value
    }
  }
};
</script>