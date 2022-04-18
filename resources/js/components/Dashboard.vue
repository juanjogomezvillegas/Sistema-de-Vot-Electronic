<template>
    <div class="tile is-ancestor mt-6">
        <div class="tile is-parent">
            <div class="tile is-child box accent has-background-black is-clickable" v-on:click="this.setResults">
                <article class="tile is-child box has-background-dark">
                    <p class="title has-text-light">{{ this.countVotes }}</p>
                    <p class="subtitle has-text-light"><i class="fa-solid fa-square-poll-vertical"></i> Votes</p>
                </article>
            </div>
        </div>
        <div class="tile is-parent" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
            <div class="tile is-child box warning has-background-black is-clickable" v-on:click="this.setCandidates">
                <article class="tile is-child box has-background-dark">
                    <p class="title has-text-light">{{ this.countCandidates }}</p>
                    <p class="subtitle has-text-light"><i class="fa-solid fa-person-booth"></i> Candidates</p>
                </article>
            </div>
        </div>
        <div class="tile is-parent" v-else-if="this.yourrole == 'supervisor'">
            <div class="tile is-child box warning has-background-black">
                <article class="tile is-child box has-background-dark">
                    <p class="title has-text-light">{{ this.countCandidates }}</p>
                    <p class="subtitle has-text-light"><i class="fa-solid fa-person-booth"></i> Candidates</p>
                </article>
            </div>
        </div>
        <div class="tile is-parent" v-if="this.yourrole == 'administrator'">
            <div class="tile is-child box danger has-background-black is-clickable" v-on:click="this.setUsers">
                <article class="tile is-child box has-background-dark">
                    <p class="title has-text-light">{{ this.countUsers }}</p>
                    <p class="subtitle has-text-light"><i class="fa-solid fa-user-group"></i> Users</p>
                </article>
            </div>
        </div>
        <div class="tile is-parent" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager' || this.yourrole == 'supervisor'">
            <div class="tile is-child box danger has-background-black is-clickable" v-on:click="this.setMessages">
                <article class="tile is-child box has-background-dark">
                    <p class="title has-text-light">{{ this.countMessage }}</p>
                    <p class="subtitle has-text-light"><i class="fa-solid fa-comments"></i> Received Messages</p>
                </article>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: 'Dashboard',
        data() {
            return {
                yourrole: '',
                countVotes: 0,
                countCandidates: 0,
                countUsers: 0,
                countMessage: 0
            }
        },
        mounted() {
            this.getYourRole();
            this.getCountVotes();
            this.getCountCandidates();
            this.getCountUsers();
            this.getCountMessages();
        },
        methods: {
            getCountVotes() {
                axios.get('/api/count-votes')
                .then((response) => {
                    this.countVotes = response.data;
                })
                .catch(error => {
                    //console.log(error);
                });
            },
            getCountCandidates() {
                axios.get('/api/count-candidates')
                .then((response) => {
                    this.countCandidates = response.data;
                })
                .catch(error => {
                    //console.log(error);
                });
            },
            getCountUsers() {
                axios.get('/api/count-users')
                .then((response) => {
                    this.countUsers = response.data;
                })
                .catch(error => {
                    //console.log(error);
                });
            },
            getCountMessages() {
                axios.get('/api/count-messages')
                .then((response) => {
                    this.countMessage = response.data;
                })
                .catch(error => {
                    //console.log(error);
                });
            },
            setUsers() {
                window.location.assign('/users');
            },
            setCandidates() {
                window.location.assign('/candidates');
            },
            setResults() {
                window.location.assign('/results');
            },
            setMessages() {
                window.location.assign('/messages');
            },
            getYourRole() {
                axios.get('/your-role')
                .then((response) => {
                    this.yourrole = response.data;
                })
                .catch(error => {
                    //console.log(error);
                });
            }
        }
    }
</script>

<style>
</style>
