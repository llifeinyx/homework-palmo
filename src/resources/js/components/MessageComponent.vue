<template>
    <div>
        <div tabindex="0" class="" style="display:flex;flex-direction: column-reverse;height: 30rem; position: relative; overflow: auto;">
            <div v-for="message in todos.slice().reverse()" v-bind:class="{'flex-row-reverse':message.reverse}" class="d-flex">
                <li  class="list-group-item p-2 m-2" style="white-space: pre-wrap;word-wrap: break-word;max-width: 60%;border-radius: 10px; background: #fff">
                    <p style="font-size: 13px;color: #4a5568">{{message.username}}</p>{{message.text}}</li>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created(){
        Echo.private('notification.'+this.chat_id)
            .listen('MessageNotification', (e) => {
                //console.log('notification.'+this.chat_id);
                this.addMsg(e.message, e.observerId);
            })
    },
    data() {
        return {
            todos:  this.messages
        }
    },
    props: [
        'messages',
        'chat_id',
    ],
    beforeMount() {
        this.todos.forEach((message) => {
          if (message.user_id !== message.observerId){
              message.reverse = true;
          } else {
              message.reverse = false;
          }
            //console.log(message);
        })
    },
    methods: {
        addMsg: function (message, observerId){
            let msg = message;
            msg.observerId = observerId;
            if (message.observerId === message.user.id){
                message.reverse = 'false';
            } else {
                message.reverse = 'true';
            }
            msg.username = message.user.name;
            //console.log(msg.reverse);
            this.todos.push(msg);
        },
    }
}
</script>

<style scoped>

</style>
