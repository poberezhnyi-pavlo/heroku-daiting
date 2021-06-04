import axios from 'axios';

export default {
    async getWomanForScroll(from) {
        return await axios.get(`api/woman/scroll?from=${from}`);
    }
}