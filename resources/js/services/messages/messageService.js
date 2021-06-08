import axios from 'axios';

export default {
    sendMessage(payload) {
        return axios.post('/api/messages/send', JSON.stringify(payload), {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        });
    },
    async getMessages(threadId) {
        return await axios.get(`/api/messages/${threadId}`);
    },
    createMessage(payload) {
        return axios.post('/api/common/messages', JSON.stringify(payload), {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        });
    }
}
