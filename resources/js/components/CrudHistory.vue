<template>
    <div>
        <div class="is-flex is-justify-content-center">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-dark" type="text" placeholder="Year" v-model="this.searchYear" v-on:change="updateSearchYear">
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>
            </div>
        </div>
        <br>
        <div class="is-flex is-justify-content-center mb-5" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
            <button class="button is-link" v-on:click="this.showModal('1', 0)">Event Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
        </div>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-narrow is-bordered is-striped is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Event Date Time">#</abbr></th>
                        <th><abbr title="Event Name">Event</abbr></th>
                        <th><abbr title="Government">Government</abbr></th>
                        <th v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(history, index) in this.histories" :key="index">
                        <td v-bind:style="'background-color: '+history.color+';'" v-if="this.isSearchYear(history.date_event) == true">{{ history.date_event }} {{ history.time_event }}</td>
                        <td v-bind:style="'background-color: '+history.color+';'" v-if="this.isSearchYear(history.date_event) == true">{{ history.name_event }}</td>
                        <td v-bind:style="'background-color: '+history.color+';'" v-if="this.isSearchYear(history.date_event) == true">{{ history.government }}</td>
                        <td v-if="(this.yourrole == 'administrator' || this.yourrole == 'manager') && (this.isSearchYear(history.date_event) == true)">
                            <button class="button is-link" v-on:click="this.showModal('2', history.id)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="button is-danger ml-1" v-on:click="this.showModal('3', history.id)"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalcreateevent">
            <div class="modal-background" v-on:click="this.hideModal('1')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-calendar mr-2"></i> Event Create</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('1')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="columns">
                        <div class="field column">
                            <label class="label">Date</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-dark" type="date" v-model="this.dataCreateHistory.date_event">
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field column">
                            <label class="label">Time</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-dark" type="time" v-model="this.dataCreateHistory.time_event">
                                <span class="icon is-small is-left">
                                    <i class="fa-solid fa-clock"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Event</label>
                        <div class="control">
                            <textarea class="textarea is-dark" placeholder="Event" v-model="this.dataCreateHistory.name_event"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Government</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="government" v-model="this.dataCreateHistory.government">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-users"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="color" v-model="this.dataCreateHistory.color">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-palette"></i>
                            </span>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="this.actions('1', this.dataCreateHistory.id)">Event Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('1')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modaleditaevent">
            <div class="modal-background" v-on:click="this.hideModal('2')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-calendar mr-2"></i> {{ this.arrayDataHistory.date_event }} {{ this.arrayDataHistory.time_event }}</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('2')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Event</label>
                        <div class="control">
                            <textarea class="textarea is-dark" placeholder="Event" v-model="this.arrayDataHistory.name_event"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Government</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="government" v-model="this.arrayDataHistory.government">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-users"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="color" v-model="this.arrayDataHistory.color">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-palette"></i>
                            </span>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="this.actions('2', this.arrayDataHistory.id)">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('2')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modaldeleteevent">
            <div class="modal-background" v-on:click="this.hideModal('3')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-calendar mr-2"></i> Warning! Event Delete</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('3')"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to event delete?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-danger" v-on:click="this.actions('3', this.arrayDataHistory.id)">Event Delete <i class="fa-solid fa-trash-can ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('3')">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudHistory',
        data() {
            return {
                yourrole: '',
                histories: [],
                arrayDataHistory: [],
                dataCreateHistory: [],
                searchYear: ''
            }
        },
        mounted() {
            this.getYourRole();
            this.listHistories();
            this.getSearchYear();
        },
        methods: {
            getSearchYear() {
                axios.get('/search-year')
                .then((response) => {
                    this.searchYear = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            updateSearchYear() {
                axios.put('/search-year/1', {
                    'searchYear': this.searchYear
                })
                .then((response) => {
                    //
                })
                .catch((error) => {
                    //
                });
            },
            isSearchYear(date_event) {
                if (this.searchYear != '') {
                    let date = new Date(date_event);

                    if (date.getFullYear().toString().startsWith(this.searchYear)) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return true;
                }
            },
            listHistories() {
                axios.get('/api/histories')
                .then((response) => {
                    this.histories = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            showModal(action, id) {
                if (action == '1') {
                    document.getElementById("modalcreateevent").classList.add('is-active');
                    axios.get('/history/last-create')
                    .then((response) => {
                        this.dataCreateHistory = response.data;
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    document.getElementById("modaleditaevent").classList.add('is-active');
                    this.dataHistory(id);
                } else if (action == '3') {
                    document.getElementById("modaldeleteevent").classList.add('is-active');
                    this.dataHistory(id);
                }
            },
            hideModal(action) {
                if (action == '1') {
                    document.getElementById("modalcreateevent").classList.remove('is-active');
                } else if (action == '2') {
                    document.getElementById("modaleditaevent").classList.remove('is-active');
                } else if (action == '3') {
                    document.getElementById("modaldeleteevent").classList.remove('is-active');
                }
            },
            dataHistory(id) {
                axios.get('/history/'+id)
                .then((response) => {
                    this.arrayDataHistory = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            actions(action, id) {
                if (action == '1') {
                    axios.post('/history/create', {
                        'date_event': this.dataCreateHistory.date_event,
                        'time_event': this.dataCreateHistory.time_event,
                        'name_event': this.dataCreateHistory.name_event,
                        'government': this.dataCreateHistory.government,
                        'color': this.dataCreateHistory.color,
                    })
                    .then((response) => {
                        document.getElementById("modalcreateevent").classList.remove('is-active');
                        this.listHistories();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    axios.put('/history/'+id, {
                        'name_event': this.arrayDataHistory.name_event,
                        'government': this.arrayDataHistory.government,
                        'color': this.arrayDataHistory.color,
                    })
                    .then((response) => {
                        document.getElementById("modaleditaevent").classList.remove('is-active');
                        this.listHistories();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '3') {
                    axios.delete('/history/'+id)
                    .then((response) => {
                        document.getElementById("modaldeleteevent").classList.remove('is-active');
                        this.listHistories();
                    })
                    .catch((error) => {
                        //
                    });
                }
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
        },
    }
</script>
