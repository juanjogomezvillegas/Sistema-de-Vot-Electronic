<template>
    <div class="container p-6" id="contactHome">
        <h1 class="title has-text-centered">Contact</h1>
        <article id="messageSendMessage" class="message is-success is-hidden">
            <div class="message-body">
                Message send successfully !!!
            </div>
        </article>
        <div class="field ">
            <label class="label m-2">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input name="email" class="input is-dark" type="email" placeholder="example@election.daw" v-model="this.contact.mail">
                <span class="icon is-small is-left">
                    <i class="fas fa-at"></i>
                </span>
            </div>
        </div>
        <div class="field">
            <div class="field">
                <label class="label m-2">Message</label>
                <div class="control">
                    <textarea name="message" class="textarea is-dark" placeholder="Message Content" v-model="this.contact.message"></textarea>
                </div>
            </div>
        </div>
        <button type="submit" class="button is-fullwidth is-dark mt-5" v-on:click="sendMessage">Send Message <i class="fas fa-paper-plane ml-2"></i></button>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: 'Contact',
        data() {
            return {
                contact: {
                    'mail': '',
                    'message': ''
                }
            }
        },
        methods: {
            sendMessage() {
                console.log();
                axios.post('/message/create', {
                    'email': this.contact.mail,
                    'message': this.contact.message,
                }).then((response) => {
                    this.contact.mail = '';
                    this.contact.message = '';
                    document.getElementById('messageSendMessage').classList.remove('is-hidden');
                }).catch((error) => {
                    //console.log(error);
                });
            }
        }
    }
</script>
