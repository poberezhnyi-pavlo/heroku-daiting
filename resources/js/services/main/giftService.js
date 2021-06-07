import axios from 'axios';

export default {
    async getGifts() {
        return await axios.get('/api/woman/gifts');
    },
    storeGift(payload) {
        return axios.post('/api/woman/gifts', JSON.stringify(payload), {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        });
    }
}