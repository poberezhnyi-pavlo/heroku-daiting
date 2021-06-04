import axios from 'axios';

export default {
    async getVideos(womanId) {
        return await axios.get(`/api/woman/${womanId}/videos`);
    }
}