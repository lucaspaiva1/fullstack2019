<template>
  <div>
    <div v-if="pets.length" class="row">
      <div v-for="pet in pets" :key="pet.id" class="col-md-6 col-lg-4 d-flex align-items-stretch">
        <PetCard class="flex-fill" :pet="pet" :enable-edit="enableEdit" />
      </div>
    </div>
    <div v-else class="text-center">
      <span class="text-muted">Nenhum Pet Econtrado.</span>
    </div>
  </div>
</template>

<script>
import PetCard from "@/components/pet/PetCard.vue";
export default {
  components: {
    PetCard
  },
  props: ["pets", "enableEdit"]
};
</script>