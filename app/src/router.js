import Vue from 'vue'
import Router from 'vue-router'
import Pets from './views/Pets.vue'
import PetsAdoption from './views/PetsAdoption.vue'
import CreatePet from './views/CreatePet.vue'
import EditPet from './views/EditPet.vue'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/', redirect: { name: 'pets' } },
    {
      path: '/pets',
      name: 'pets',
      component: Pets
    },
    {
      path: '/pets-adoption',
      name: 'pets-adoption',
      component: PetsAdoption
    },
    {
      path: '/pet-create',
      name: 'pet-create',
      component: CreatePet
    },
    {
      path: '/pet-edit/:id',
      name: 'pet-edit',
      component: EditPet,
      props: true
    }
  ]
})
