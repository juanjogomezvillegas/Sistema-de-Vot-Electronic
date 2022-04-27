<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
            <button class="button is-link" v-if="this.countCandidates > 0" v-on:click="this.showModal">Restart Votes <i class="fa-solid fa-rotate-right ml-2"></i></button>
            <button class="button is-link ml-2" v-on:click="this.pactometer">Pactometer <i class="fa-solid fa-handshake ml-2"></i></button>
        </div>
        <div class="is-flex is-justify-content-center mb-5" v-else>
            <button class="button is-link ml-2" v-on:click="this.pactometer">Pactometer <i class="fa-solid fa-handshake ml-2"></i></button>
        </div>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-bordered is-striped is-narrow is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Color">#</abbr></th>
                        <th><abbr title="Name">Name</abbr></th>
                        <th><abbr title="Party">Party</abbr></th>
                        <th><abbr title="Votes">Votes</abbr></th>
                        <th><abbr title="Seats">Seats</abbr></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(candidate, index) in this.candidates" :key="index">
                        <td v-bind:style="'background-color: '+candidate.color+';'"></td>
                        <td>{{ candidate.name }}</td>
                        <td>{{ candidate.party }}</td>
                        <td>{{ candidate.votes }}</td>
                        <td>{{ candidate.seats }}</td>
                    </tr>
                </tbody>
                <tfoot v-if="this.countCandidates > 0" class="has-background-grey-lighter">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ this.totalVotes }}</td>
                        <td>{{ this.totalSeats }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="modal" id="modalrestartvotes">
            <div class="modal-background" v-on:click="this.hideModal"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-circle-exclamation mr-2"></i> Warning! Restart Votes</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to Restart Votes?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-danger" v-on:click="this.restartvotes">Restart Votes <i class="fa-solid fa-trash-can ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Results',
        data() {
            return {
                yourrole: '',
                countCandidates: 0,
                candidates: [],
                totalVotes: 0,
                totalSeats: 0
            }
        },
        mounted() {
            this.getYourRole();
            this.getCountCandidates();
            this.listCandidates();
            this.getTotalVotes();
            this.getTotalSeats();
        },
        methods: {
            listCandidates() {
                axios.get('/candidates/all')
                .then((response) => {
                    this.candidates = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            getTotalVotes() {
                axios.get('/api/count-votes')
                .then((response) => {
                    this.totalVotes = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            getTotalSeats() {
                axios.get('/api/count-seats')
                .then((response) => {
                    this.totalSeats = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            showModal() {
                document.getElementById('modalrestartvotes').classList.add('is-active');
            },
            hideModal() {
                document.getElementById('modalrestartvotes').classList.remove('is-active');
            },
            restartvotes() {
                axios.delete('/restart-votes')
                .then((response) => {
                    this.hideModal();
                    this.listCandidates();
                    this.getTotalVotes();
                    this.getTotalSeats();
                })
                .catch((error) => {
                    //
                });
            },
            pactometer() {
                window.location.assign('/pactometer');
            },
            getYourRole() {
                axios.get('/your-role')
                .then((response) => {
                    this.yourrole = response.data;
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
            }
        }
    }
</script>
