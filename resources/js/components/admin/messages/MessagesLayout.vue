<template>
    <div>
        <div class="row">
            <div class="col">
                <create-new-chat-form
                    :men="men"
                    :women="women"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <chat></chat>
            </div>
            <div class="col-4">
                <chat-history>

                </chat-history>
            </div>
        </div>
    </div>
</template>

<script>
import Chat from "./Chat";
import ChatHistory from "./ChatHistory";
import CreateNewChatForm from "./CreateNewChatForm";

export default {
    name: 'MessagesLayout',
    components: {
        CreateNewChatForm,
        ChatHistory,
        Chat,
    },
    props: {
        men: {},
        women: {},
    }
}
</script>

<style scoped>

</style>
