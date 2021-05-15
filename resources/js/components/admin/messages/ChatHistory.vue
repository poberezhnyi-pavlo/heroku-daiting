<template>
    <ul class="contacts-list">
        <li>
            <a href="#">
                <img src="/docs/3.0/assets/img/user1-128x128.jpg" class="contacts-list-img">
                <div class="contacts-list-info">
                    <span class="contacts-list-name">
                        <h6>Diana Lopes</h6>
                        <small class="contacts-list-date float-right">
                            2/28/2015
                        </small>
                    </span>
                    <small class="contacts-list-msg">
                        How have you been? I was...
                    </small>
                </div>
            </a>
        </li>
    </ul>
</template>

<script>
import urlConsts from "../../mixins/urlConsts";
import axios from "axios";
export default {
    name: 'ChatHistory',
    data() {
        return {
           threads: [],
        }
    },
    methods: {
        getThreads() {
            axios.get(urlConsts.MESSAGE_URL, {
                headers: {
                    Accept: 'application/json',
                }
            })
                .then((response) => {
                    console.log(response);
                    this.threads = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    beforeMount() {
        this.getThreads();
    }
}
</script>

<style scoped lang="scss">
    .contacts-list-name {
        h6 {
            color: #383838;
        }
    }
</style>
