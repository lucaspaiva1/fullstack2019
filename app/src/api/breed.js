import axios from 'axios'

export default {
    all() {
        return axios.get('/breeds')
            .then((response) => {
                return response.data.data
            });
    }
}