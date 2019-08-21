import axios from 'axios'

export default {
    all() {
        return axios.get('/species')
            .then((response) => {
                return response.data.data
            });
    }
}