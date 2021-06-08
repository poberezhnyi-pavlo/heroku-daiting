<template>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Send message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" v-model="subject">
            </div>
            <div class="form-group">
                <textarea class="form-control" v-model="body"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="send">Send</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</template>

<script>
import messageService from '../../../services/messages/messageService';

export default {
    name: 'CreateMessageComponent',
    props: {
        womanId: {
            type: Number,
            required: true,
        },
        manId: {
            type: Number,
            required: true,
        }
    },
    data() {
        return {
            subject: '',
            body: '',
        }
    },
    methods: {
        send() {
            const payload = {
                subject: this.subject,
                message: this.body,
                to: this.womanId,
                from: this.manId,
            };

            messageService.createMessage(payload);
        }
    }
}
</script>

<style scoped>

</style>