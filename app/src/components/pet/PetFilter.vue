<template>
  <div>
    <h6>Filtros</h6>
    <div class="row align-bottom">
      <div class="form-group col-sm-6 col-md-3 d-flex align-items-end align-bottom">
        <SpeciesSelect
          class="flex-fill"
          @updated="setFilterSpecies"
          :enable-null="true"
          null-option-text="Todas"
        ></SpeciesSelect>
      </div>
      <div class="form-group col-sm-6 col-md-3 d-flex align-items-end align-bottom">
        <BreedSelect
          class="flex-fill"
          :species-id="filters.species_id"
          @updated="setFilterBreed"
          :enable-null="true"
          null-option-text="Todas"
        ></BreedSelect>
      </div>
      <div class="form-group col-sm-6 col-md-3 d-flex align-items-end align-bottom">
        <div class="flex-fill">
          <label for="breed-select">Idade</label>
          <input
            class="form-control"
            type="number"
            min="1"
            v-model="filters.age"
            placeholder="Idade"
          />
        </div>
      </div>
      <div class="form-group col-sm-6 col-md-3 d-flex align-items-end align-bottom">
        <div class="flex-fill">
          <label for="breed-select">Sexo</label>
          <select class="custom-select" v-model="filters.gender">
            <option :value="null">Qualquer</option>
            <option value="M">Macho</option>
            <option value="F">Fêmea</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SpeciesSelect from "@/components/species/SpeciesSelect";
import BreedSelect from "@/components/breed/BreedSelect";

export default {
  components: {
    SpeciesSelect,
    BreedSelect
  },
  data() {
    return {
      filters: {
        gender: null,
        age: null,
        species_id: null,
        breed_id: null
      }
    };
  },
  methods: {
    setFilterSpecies(value) {
      this.filters.species_id = value;
    },
    setFilterBreed(value) {
      this.filters.breed_id = value;
    }
  },
  watch: {
    filters: {
      handler() {
        this.$emit("submit", this.filters);
      },
      deep: true
    }
  }
};
</script>