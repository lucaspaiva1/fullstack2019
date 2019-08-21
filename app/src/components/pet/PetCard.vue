<template>
  <div class="card mb-4 border-0 shadow-sm" :class="{dimmed: pet.died_at}">
    <div class="card-header">
      <div v-if="enableEdit" class="float-right align-top">
        <button class="btn btn-link text-secondary pr-0" @click="update">
          <i class="fas fa-edit"></i>
        </button>
      </div>
      <h3 class="mb-0">
        <i v-if="pet.died_at" class="fas fa-cross"></i>
        {{ pet.name }}
        <span class="pet-id text-secondary">#{{pet.id}}</span>
      </h3>
      <span>{{ pet.species }} - {{ pet.breed }}</span>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-6 mb-2">
          <label class="label">Idade</label>
          <span>{{ pet.age }} {{ pet.age == 1 ? 'Ano' : 'Anos' }}</span>
        </div>
        <div class="col-6 mb-2">
          <label class="label">Nascimento</label>
          <span>{{ pet.born_at }}</span>
        </div>
        <div class="col-6 mb-2">
          <label class="label">Sexo</label>
          <span>{{ getGender }}</span>
        </div>
        <div v-if="pet.died_at" class="col-6 mb-2">
          <label class="label">Falecimento</label>
          <span>{{ pet.died_at }}</span>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <small>Atualizado pela útima vez em {{ pet.updated_at }}</small>
    </div>
  </div>
</template>

<script>
export default {
  props: ["pet", "enableEdit"],
  methods: {
    update() {
      this.$router.push({ name: "pet-edit", params: { id: this.pet.id } });
    }
  },
  computed: {
    getGender() {
      return { M: "Macho", F: "Fêmea" }[this.pet.gender];
    }
  }
};
</script>

<style lang="scss" scoped>
$color_1: #383838;
$normal: white;
$dimmed: #dddddd;

.label {
  display: block;
  font-weight: bold;
  font-size: 14px;
  margin: 0px;
}

.card {
  .card-header {
    background-color: $normal;
  }
  .card-footer {
    background-color: $normal;
  }
}

.dimmed {
  .card-header {
    background-color: $dimmed;
  }
  .card-footer {
    background-color: $dimmed;
  }
  background-color: $dimmed;
  opacity: 0.3;
  color: $color_1;
}

.pet-id {
  font-size: 15px;
}
</style>