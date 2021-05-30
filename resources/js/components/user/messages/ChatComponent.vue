<template>
    <main>
        <header>
            <img :src="participant.avatar" :alt="participant.name">
            <div>
                <h2>{{ participant.name }}</h2>
                <h3>already 1902 messages</h3>
            </div>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="">
        </header>
        <ul id="chat">
            <li
                v-for="message in messages"
                :class="classMessage(message.user.id)"
            >
                <div class="entete">
                    <span class="status green"></span>
                    <h2>{{ message.user.name }}</h2>
                    <h3>{{ message.created_at }}</h3>
                </div>
                <div class="triangle"></div>
                <div class="message">
                    {{ message.body }}
                </div>
            </li>
        </ul>
        <footer>
            <textarea placeholder="Type your message" v-model="body"></textarea>
            <button class="btn btn-success" @click="sendMessage">Send</button>
        </footer>
    </main>
</template>

<script>
import messageService from '../../../services/messages/messageService';
import participantService from '../../../services/messages/participantService';

export default {
    name: 'ChatComponent',
    props: {
        participant: {
            type: Object,
            required: true,
        },
        user: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            body: '',
            messages: [],
            participant: {},
        }
    },
    mounted() {
        this.getMessages();
        this.getParticipant();
    },
    methods: {
        classMessage(id) {
            if (id === this.user.id) {
                return 'me';
            }

            return 'you';
        },
        sendMessage() {
            const payload = {
                thread_id: this.participant.thread_id,
                body: this.body,
                user_id: this.user.id,
            }

            messageService.sendMessage(payload);

            this.body = '';
            this.getMessages();
        },
        getMessages() {
            messageService.getMessages(this.participant.thread_id)
                .then((response) => {
                    this.messages = response.data
                })
            ;
        },
        getParticipant() {
            participantService.getParticipant(this.participant.id)
                .then((response) => {
                    this.participant = response.data;
                })
            ;
        }
    }
}
</script>

<style scoped>
main{
    width:490px;
    height:800px;
    display:inline-block;
    font-size:15px;
    vertical-align:top;
}

main header{
    height:110px;
    padding:30px 20px 30px 40px;
}
main header > *{
    display:inline-block;
    vertical-align:top;
}
main header img:first-child{
    border-radius:50%;
}
main header img:last-child{
    width:24px;
    margin-top:8px;
}
main header div{
    margin-left:10px;
    margin-right:145px;
}
main header h2{
    font-size:16px;
    margin-bottom:5px;
}
main header h3{
    font-size:14px;
    font-weight:normal;
    color:#7e818a;
}

#chat{
    padding-left:0;
    margin:0;
    list-style-type:none;
    overflow-y:scroll;
    height:535px;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
}
#chat li{
    padding:10px 30px;
}
#chat h2,#chat h3{
    display:inline-block;
    font-size:13px;
    font-weight:normal;
}
#chat h3{
    color:#bbb;
}
#chat .entete{
    margin-bottom:5px;
}
#chat .message{
    padding:20px;
    color:#fff;
    line-height:25px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
}
#chat .me{
    text-align:right;
}
#chat .you .message{
    background-color:#58b666;
}
#chat .me .message{
    background-color:#6fbced;
}
#chat .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 10px 10px 10px;
}
#chat .you .triangle{
    border-color: transparent transparent #58b666 transparent;
    margin-left:15px;
}
#chat .me .triangle{
    border-color: transparent transparent #6fbced transparent;
    margin-left:375px;
}

main footer{
    height:155px;
    padding:20px 30px 10px 20px;
}
main footer textarea{
    resize:none;
    border:none;
    display:block;
    width:100%;
    height:80px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
}
main footer textarea::placeholder{
    color:#ddd;
}
main footer img{
    height:30px;
    cursor:pointer;
}
main footer a{
    text-decoration:none;
    text-transform:uppercase;
    font-weight:bold;
    color:#6fbced;
    vertical-align:top;
    margin-left:333px;
    margin-top:5px;
    display:inline-block;
}
</style>