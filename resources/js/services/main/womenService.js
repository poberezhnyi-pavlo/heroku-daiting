import axios from 'axios';

export default {
    async getWomanForScroll(from, count) {
        return await axios.get(`api/woman/scroll?from=${from}&count=${count}`);
    }
}
