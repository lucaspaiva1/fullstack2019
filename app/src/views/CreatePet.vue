<template>
  <div>
    <h3 class="mb-3">Cadastar Pet</h3>
    <PetForm @submit="submit"></PetForm>
  </div>
</template>

<script>
import PetForm from "@/components/pet/PetForm";
import petAPI from "@/api/pet.js";
import swal from "sweetalert2";
import dialogs from '@/helpers/dialogs.js'

export default {
  components: {
    PetForm
  },
  methods: {
    submit(pet) {
      petAPI
        .store(pet)
        .then(() => {
          swal
            .fire({
              type: "success",
              title: "Pet cadastrado com sucesso!"
            })
            .then(() => {
              this.$router.push({ name: "pets" });
            });
        })
        .catch(err => {
          dialogs.captureError(err.message)
        });
    }
  }
};
</script>