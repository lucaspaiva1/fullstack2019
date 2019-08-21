<template>
  <form class="mt-4" @submit.prevent="submit">
    <div class="form-group">
      <label for="name">Nome</label>
      <input
        type="text"
        class="form-control"
        id="name"
        placeholder="Nome do Pet"
        v-model="pet.name"
        required
      />
    </div>
    <div class="form-group">
      <label for="gender-select">Sexo</label>
      <select id="gender-select" class="custom-select" v-model="pet.gender" required>
        <option :value="null" disabled>Selecione o sexo</option>
        <option value="M">Macho</option>
        <option value="F">Fêmea</option>
      </select>
    </div>
    <div class="form-group">
      <label for="birthdate">Data de Nascimento</label>
      <input type="date" class="form-control" id="birthdate" v-model="pet.born_at" required/>
    </div>
    <div v-if="showDiedInput" class="form-group">
      <label for="died_at">Data de Falecimento</label>
      <input type="date" class="form-control" id="died_at" v-model="pet.died_at" />
    </div>
    <div class="form-group">
      <SpeciesSelect @updated="setPetSpecies" :initial-species="pet.species_id"></SpeciesSelect>
    </div>
    <div class="form-group">
      <BreedSelect
        :species-id="pet.species_id"
        @updated="setPetBreed"
        :initial-breed="pet.breed_id"
      ></BreedSelect>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">{{ submitText }}</button>
    </div>
  </form>
</template>

<script>
import SpeciesSelect from "@/components/species/SpeciesSelect";
import BreedSelect from "@/components/breed/BreedSelect";

export default {
  components: {
    SpeciesSelect,
    BreedSelect
  },
  props: ["showDiedInput", "originalPet"],
  data() {
    return {
      pet: {
        name: null,
        gender: null,
        born_at: null,
        species_id: null,
        breed_id: null
      }
    };
  },
  methods: {
    setPetSpecies(value) {
      this.pet.species_id = value;
    },
    setPetBreed(value) {
      this.pet.breed_id = value;
    },
    submit() {
      this.$emit("submit", this.pet);
    }
  },
  computed: {
    submitText() {
      return this.originalPet ? "Finalizar Edição" : "Finalizar Cadastro";
    }
  },
  watch: {
    originalPet() {
      this.pet = {
        ...this.originalPet
      };
    }
  }
};
</script>