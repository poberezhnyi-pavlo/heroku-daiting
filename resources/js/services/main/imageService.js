import axios from 'axios';

export default {
    async getImages(womanId) {
        return await axios.get(`/api/woman/${womanId}/images`);
    },
}