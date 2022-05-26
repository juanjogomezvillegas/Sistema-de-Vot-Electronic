<template>
    <div>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                <thead class="has-background-grey-light">
                    <tr>
                        <th class="has-text-centered"><abbr title="Message Id">#</abbr></th>
                        <th class="has-text-centered"><abbr title="Message Origin">Email</abbr></th>
                        <th class="has-text-centered"><abbr title="Message Send Date">Send Date</abbr></th>
                        <th class="has-text-centered">Actions</th>
                    </tr>
                </thead>
                <tbody class="has-background-white-ter">
                    <tr v-for="(message, index) in this.messages" :key="index">
                        <td class="has-text-centered">{{ message.id }}</td>
                        <td class="has-text-centered"><a v-bind:href="'mailto:'+message.email">{{ message.email }}</a></td>
                        <td class="has-text-centered">{{ message.created_at }}</td>
                        <td class="has-text-left">
                            <button class="button is-link ml-1" v-on:click="this.showModal('1', message.id)"><i class="fa-solid fa-envelope-open-text"></i></button>
                            <button class="button is-danger ml-1" v-on:click="this.showModal('2', message.id)"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalcontentmessage">
            <div class="modal-background" v-on:click="this.hideModal('1')"></div>
            <div class="modal-content">
                <div class="box">
                    <div class="card">
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-5">{{ this.dataMessage.email }}</p>
                                </div>
                            </div>
                            <div class="content">
                                {{ this.dataMessage.message }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close" v-on:click="this.hideModal('1')"></button>
        </div>
        <div class="modal" id="modaldeletemessage">
            <div class="modal-background" v-on:click="this.hideModal('2')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-circle-exclamation mr-2"></i> Warning! Candidate Delete</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('2')"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to message delete?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                <button class="button is-danger" v-on:click="this.deleteMessage(this.dataMessage.id)">Message Delete <i class="fa-solid fa-trash-can ml-2"></i></button>
                <button class="button is-light" v-on:click="this.hideModal('2')">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudMessages',
        data() {
            return {
                messages: [],
                dataMessage: []
            }
        },
        mounted() {
            this.listMessages();
        },
        methods: {
            listMessages() {
                axios.get('/messages/all')
                .then((response) => {
                    this.messages = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            showModal(action, id) {
                axios.get('/message/'+id)
                .then((response) => {
                    this.dataMessage = response.data;
                })
                .catch((error) => {
                    //
                });
                if (action == '1') {
                    document.getElementById('modalcontentmessage').classList.add('is-active');
                } else if (action == '2') {
                    document.getElementById('modaldeletemessage').classList.add('is-active');
                }
            },
            hideModal(action) {
                if (action == '1') {
                    document.getElementById('modalcontentmessage').classList.remove('is-active');
                } else if (action == '2') {
                    document.getElementById('modaldeletemessage').classList.remove('is-active');
                }
            },
            deleteMessage(id) {
                axios.delete('/message/'+id)
                .then((response) => {
                    this.hideModal('2');
                    this.listMessages();
                })
                .catch((error) => {
                    //
                });
            }
        },
    }
</script>
