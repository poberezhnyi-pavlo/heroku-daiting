<template>
    <div id="container">
        <aside>
            <header>
                <input type="text" placeholder="search">
            </header>
            <ul>
                <li v-for="participant in participants" @click="setParticipant(participant)">
                    <img
                        :src="participant.avatar"
                        :alt="participant.name"
                    >
                    <div>
                        <h2>
                            {{ participant.name }}
                        </h2>
                    </div>
                </li>
            </ul>
        </aside>
        <chat-component
            v-if="participant"
            :key="index"
            :participant="participant"
            :user="user"
        />
    </div>
</template>

<script>
import ChatComponent from './ChatComponent';
import participantService from '../../../services/messages/participantService';

export default {
    name: 'MessagesComponent',
    components: {
        ChatComponent,
    },
    props: {
        user: {
            type: Object,
            required: true,
            index: 0,
        }
    },
    data() {
        return {
            participants: [],
            participant: undefined,
        }
    },
    mounted() {
        this.getParticipants();
    },
    methods: {
        getParticipants() {
            participantService.getParticipants(this.user)
                .then((response) => {
                    this.participants = response.data;
                })
            ;
        },
        setParticipant(object) {
            this.index = object.id
            this.participant = object;
        }
    }
}
</script>

<style scoped>
#container {
    width: 750px;
    height: 800px;
    background: #eff3f7;
    margin: 0 auto;
    font-size: 0;
    border-radius: 5px;
    overflow: hidden;
}

aside {
    width: 260px;
    height: 800px;
    background-color: #3b3e49;
    display: inline-block;
    font-size: 15px;
    vertical-align: top;
}

aside header {
    padding: 30px 20px;
}

aside input {
    width: 100%;
    height: 50px;
    line-height: 50px;
    padding: 0 50px 0 20px;
    background-color: #5e616a;
    border: none;
    border-radius: 3px;
    color: #fff;
    background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
    background-repeat: no-repeat;
    background-position: 170px;
    background-size: 40px;
}

aside input::placeholder {
    color: #fff;
}

aside ul {
    padding-left: 0;
    margin: 0;
    list-style-type: none;
    overflow-y: scroll;
    height: 690px;
}

aside li {
    padding: 10px 0;
}

aside li:hover {
    background-color: #5e616a;
}

h2, h3 {
    margin: 0;
}

aside li img {
    border-radius: 50%;
    margin-left: 20px;
    margin-right: 8px;
}

aside li div {
    display: inline-block;
    vertical-align: top;
    margin-top: 12px;
}

aside li h2 {
    font-size: 14px;
    color: #fff;
    font-weight: normal;
    margin-bottom: 5px;
}

aside li h3 {
    font-size: 12px;
    color: #7e818a;
    font-weight: normal;
}

</style>