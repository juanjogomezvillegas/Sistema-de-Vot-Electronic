<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5">
            <button class="button is-link" v-on:click="this.showModal('1', 0)">Candidates Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
        </div>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-narrow is-bordered is-striped is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Color">#</abbr></th>
                        <th><abbr title="Name">Name</abbr></th>
                        <th><abbr title="Party">Party</abbr></th>
                        <th><abbr title="Ideology">Ideology</abbr></th>
                        <th><abbr title="Campaign">Campaign</abbr></th>
                        <th><abbr title="Votes">Votes</abbr></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(candidate, index) in this.candidates" :key="index">
                        <td v-bind:style="'background-color: '+candidate.color+';'"></td>
                        <td>{{ candidate.name }}</td>
                        <td>{{ candidate.party }}</td>
                        <td>{{ candidate.ideology }}</td>
                        <td>{{ candidate.campaign }}</td>
                        <td>{{ candidate.votes }}</td>
                        <td>
                            <button class="button is-link" v-on:click="this.showModal('2', candidate.id)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="button is-danger ml-1" v-on:click="this.showModal('3', candidate.id)"><i class="fa-solid fa-trash-can"></i></button>
                            <button class="button is-light ml-2" v-on:click="this.setSumVotes(candidate.id)"><i class="fa-solid fa-plus"></i></button>
                            <button class="button is-light ml-1" v-on:click="this.setSubstractVotes(candidate.id)"><i class="fa-solid fa-minus"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalcreatecandidate">
            <div class="modal-background" v-on:click="this.hideModal('1')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-user-plus mr-2"></i> Candidate Create</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('1')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="name" v-model="this.arrayCreateCandidate.name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Party</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="party" v-model="this.arrayCreateCandidate.party">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-handshake"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Ideology</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="ideology" v-model="this.arrayCreateCandidate.ideology">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-lightbulb"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Campaign</label>
                        <div class="control">
                            <textarea class="textarea" placeholder="campaign" v-model="this.arrayCreateCandidate.campaign"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control">
                            <input class="input" type="color" v-model="this.arrayCreateCandidate.color">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="this.actions('1', 0)">Candidate Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('1')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modalupdatecandidate">
            <div class="modal-background" v-on:click="this.hideModal('2')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-user mr-2"></i> {{ this.arrayDataCandidate.name }}</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('2')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Votes</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="number" v-model="this.arrayDataCandidate.votes">
                            <span class="icon is-small is-left">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="name" v-model="this.arrayDataCandidate.name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Party</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="party" v-model="this.arrayDataCandidate.party">
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-handshake"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Ideology</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="ideology" v-model="this.arrayDataCandidate.ideology">
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-lightbulb"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Campaign</label>
                        <div class="control">
                            <textarea class="textarea" placeholder="campaign" v-model="this.arrayDataCandidate.campaign"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control">
                            <input class="input" type="color" v-model="this.arrayDataCandidate.color">
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="this.actions('2', arrayDataCandidate.id)">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('2')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modaldeletecandidate">
            <div class="modal-background" v-on:click="this.hideModal('3')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-circle-exclamation mr-2"></i> Warning! Candidate Delete</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('3')"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to candidate delete {{ this.arrayDataCandidate.name }}?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-danger" v-on:click="this.actions('3', arrayDataCandidate.id)">Candidate Delete <i class="fa-solid fa-trash-can ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('3')">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudCandidates',
        data() {
            return {
                candidates: [],
                arrayDataCandidate: [],
                arrayCreateCandidate: {
                    'name': '',
                    'party': '',
                    'ideology': '',
                    'campaign': '',
                    'color': '',
                    'votes': '',
                },
                votes: 0,
            }
        },
        mounted() {
            this.listCandidates();
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
            showModal(action, id) {
                if (action == '1') {
                    document.getElementById("modalcreatecandidate").classList.add('is-active');
                } else if (action == '2') {
                    document.getElementById("modalupdatecandidate").classList.add('is-active');
                    this.dataCandidate(id);
                } else if (action == '3') {
                    document.getElementById("modaldeletecandidate").classList.add('is-active');
                    this.dataCandidate(id);
                }
            },
            hideModal(action) {
                if (action == '1') {
                    document.getElementById("modalcreatecandidate").classList.remove('is-active');
                } else if (action == '2') {
                    document.getElementById("modalupdatecandidate").classList.remove('is-active');
                } else if (action == '3') {
                    document.getElementById("modaldeletecandidate").classList.remove('is-active');
                }
            },
            dataCandidate(id) {
                axios.get('/candidate/'+id)
                .then((response) => {
                    this.arrayDataCandidate = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            actions(action, id) {
                if (action == '1') {
                    axios.post('/candidate/create', {
                        'name': this.arrayCreateCandidate.name,
                        'party': this.arrayCreateCandidate.party,
                        'ideology': this.arrayCreateCandidate.ideology,
                        'campaign': this.arrayCreateCandidate.campaign,
                        'color': this.arrayCreateCandidate.color,
                    })
                    .then((response) => {
                        document.getElementById("modalcreatecandidate").classList.remove('is-active');
                        this.listCandidates();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    axios.put('/candidate/'+id, {
                        'name': this.arrayDataCandidate.name,
                        'party': this.arrayDataCandidate.party,
                        'ideology': this.arrayDataCandidate.ideology,
                        'campaign': this.arrayDataCandidate.campaign,
                        'color': this.arrayDataCandidate.color,
                        'votes': this.arrayDataCandidate.votes,
                    })
                    .then((response) => {
                        document.getElementById("modalupdatecandidate").classList.remove('is-active');
                        this.listCandidates();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '3') {
                    axios.delete('/candidate/'+id)
                    .then((response) => {
                        document.getElementById("modaldeletecandidate").classList.remove('is-active');
                        this.listCandidates();
                    })
                    .catch((error) => {
                        //
                    });
                }
            },
            setSumVotes(id) {
                axios.put('/sum-votes/'+id)
                .then((response) => {
                    this.listCandidates();
                })
                .catch((error) => {
                    //
                });
            },
            setSubstractVotes(id) {
                axios.put('/substract-votes/'+id)
                .then((response) => {
                    this.listCandidates();
                })
                .catch((error) => {
                    //
                });
            }
        }
    }
</script>
