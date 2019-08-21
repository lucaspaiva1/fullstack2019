<template>
  <div>
    <h3 class="mb-3">Editar Pet</h3>
    <PetForm @submit="submit" :original-pet="pet" :show-died-input="true"></PetForm>
  </div>
</template>

<script>
import PetForm from "@/components/pet/PetForm";
import petApi from "@/api/pet.js";
import swal from "sweetalert2";
import dialogs from "@/helpers/dialogs.js";
import moment from "moment";

export default {
  components: {
    PetForm
  },
  data() {
    return {
      pet: {}
    };
  },
  methods: {
    submit(pet) {
      petApi
        .update(pet.id, pet)
        .then(() => {
          swal
            .fire({
              type: "success",
              title: "Pet atualizado com sucesso!"
            })
            .then(() => {
              this.$router.push({ name: "pets" });
            });
        })
        .catch(err => {
          dialogs.captureError(err.message);
        });
    },
    handlePet(pet) {
      pet.born_at = this.parseDate(pet.born_at);
      pet.died_at = this.parseDate(pet.died_at);
      return pet;
    },
    addToPet(pet) {
      return (this.pet = { ...pet });
    },
    findPet(petId) {
      petApi
        .find(petId)
        .then(this.handlePet)
        .then(this.addToPet)
        .catch(() => {
          this.$router.push({ name: "pets" });
        });
    },
    parseDate(date) {
      return date ? moment(date, "DD/MM/YYYY").format("YYYY-MM-DD") : null;
    }
  },
  mounted() {
    this.findPet(this.$route.params.id);
  }
};
</script>