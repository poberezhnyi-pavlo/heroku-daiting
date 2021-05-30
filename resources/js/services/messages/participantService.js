import axios from 'axios';

export default {
    async getParticipants(user) {
        return await axios.get(`/api/messages/${user.id}/participants`);
    },
    async getParticipant(participantId) {
        return await axios.get(`/api/messages/${participantId}/`)
    }
}