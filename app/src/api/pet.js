import axios from 'axios'

const requests = {
    all() {
        return axios.get('/pets')
            .then((response) => {
                return response.data.data
            })
            .catch((err) => {
                throw new Error(err.response.data.error.description)
            })
    },
    store(pet) {
        return axios.post('/pets', pet)
            .then((response) => {
                return response.data
            })
            .catch((err) => {
                throw new Error(err.response.data.error.description)
            })
    },
    find(petId) {
        return axios.get(`/pets/${petId}`)
            .then((response) => {
                return response.data.data
            })
            .catch((err) => {
                throw new Error(err.response.data.error.description)
            })
    },
    update(petId, pet) {
        return axios.put(`/pets/${petId}`, pet)
            .then((response) => {
                return response.data.data
            })
            .catch((err) => {
                throw new Error(err.response.data.error.description)
            })
    }
}

export default requests