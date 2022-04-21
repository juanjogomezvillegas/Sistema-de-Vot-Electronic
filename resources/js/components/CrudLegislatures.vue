<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5">
            <button class="button is-link" v-on:click="showModal('1', -1)">Legilature Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
        </div>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-narrow is-bordered is-striped is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Number of legilature">#</abbr></th>
                        <th><abbr title="Election">Election</abbr></th>
                        <th><abbr title="Begin of legilature">Begin</abbr></th>
                        <th><abbr title="End of legilature">End</abbr></th>
                        <th><abbr title="President">President</abbr></th>
                        <th><abbr title="Party">Party</abbr></th>
                        <th><abbr title="Government">Government</abbr></th>
                        <th><abbr title="Vicepresident">Vicepresident</abbr></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(legislature, index) in this.legislatures" :key="index">
                        <td>{{ legislature.number }}</td>
                        <td>{{ legislature.election }}</td>
                        <td>{{ legislature.begin }}</td>
                        <td>{{ legislature.end }}</td>
                        <td>{{ legislature.president }}</td>
                        <td>{{ legislature.party }}</td>
                        <td>{{ legislature.government }}</td>
                        <td>{{ legislature.vicepresident }}</td>
                        <td>
                            <button class="button is-link"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="button is-danger ml-1"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalcreateLegislature">
            <div class="modal-background" v-on:click="hideModal('1')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-rectangle-history-circle-plus mr-2"></i> Legislature Create</p>
                <button class="delete" aria-label="close" v-on:click="hideModal('1')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Number of legilature</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="number" v-model="this.arrayCreateLegislature.number">
                            <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Election</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="date" v-model="this.arrayCreateLegislature.dateElection">
                            <span class="icon is-small is-left">
                                <i class="fas fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Date Begin</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date" v-model="this.arrayCreateLegislature.dateBegin">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time Begin</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="time" v-model="this.arrayCreateLegislature.timeBegin">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Date End</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date" v-model="this.arrayCreateLegislature.dateEnd">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time End</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="time" v-model="this.arrayCreateLegislature.timeEnd">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">President</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="President" v-model="this.arrayCreateLegislature.president">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Vicepresident</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="Vicepresident" v-model="this.arrayCreateLegislature.vicepresident">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Party</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="Party" v-model="this.arrayCreateLegislature.party">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-handshake"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Government</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="Government" v-model="this.arrayCreateLegislature.government">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-landmark"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="color" v-model="this.arrayCreateLegislature.color">
                            <span class="icon is-small is-left">
                                <i class="fas fa-paintbrush"></i>
                            </span>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="actions('1', -1)">Legislature Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
                    <button class="button is-light" v-on:click="hideModal('1')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modalupdateLegislature">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-rectangle-history-circle-user mr-2"></i> </p>
                <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Number of legilature</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="number">
                            <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Election</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="date">
                            <span class="icon is-small is-left">
                                <i class="fas fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Date Begin</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time Begin</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="time">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Date End</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Time End</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="time">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">President</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="number">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Vicepresident</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="number">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Party</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="number">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-handshake"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Government</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="number">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-landmark"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Color</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="color">
                            <span class="icon is-small is-left">
                                <i class="fas fa-paintbrush"></i>
                            </span>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                    <button class="button is-light">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modaldeleteLegislature">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-circle-exclamation mr-2"></i> Warning! Legislature Delete</p>
                <button class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to legislature delete ?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-danger">Legislature Delete <i class="fa-solid fa-trash-can ml-2"></i></button>
                    <button class="button is-light">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudLegislatures',
        data() {
            return {
                legislatures: [],
                arrayDataLegislature: [],
                arrayCreateLegislature: {
                    'number': '',
                    'dateElection': '',
                    'dateBegin': '',
                    'timeBegin': '',
                    'dateEnd': '',
                    'timeEnd': '',
                    'president': '',
                    'vicepresident': '',
                    'party': '',
                    'government': '',
                    'color': '',
                }
            }
        },
        mounted() {
            this.listLegislatures();
        },
        methods: {
            listLegislatures() {
                axios.get('/legislatures/all')
                .then((response) => {
                    this.legislatures = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            showModal(action, id) {
                if (action == '1') {
                    document.getElementById("modalcreateLegislature").classList.add('is-active');
                } else if (action == '2') {
                    document.getElementById("modalupdateLegislature").classList.add('is-active');
                } else if (action == '3') {
                    document.getElementById("modaldeleteLegislature").classList.add('is-active');
                }
            },
            hideModal(action) {
                if (action == '1') {
                    document.getElementById("modalcreateLegislature").classList.remove('is-active');
                } else if (action == '2') {
                    document.getElementById("modalupdateLegislature").classList.remove('is-active');
                } else if (action == '3') {
                    document.getElementById("modaldeleteLegislature").classList.remove('is-active');
                }
            },
            dataLegislature(id) {
                axios.get('/legislature/'+id)
                .then((response) => {
                    this.arrayDataLegislature = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            actions(action, id) {
                if (action == '1') {
                    axios.post('/legislatures/create', {
                        'number': this.arrayCreateLegislature.number,
                        'election': this.arrayCreateLegislature.dateElection,
                        'begin': this.arrayCreateLegislature.dateBegin+' '+this.arrayCreateLegislature.timeBegin,
                        'end': this.arrayCreateLegislature.dateEnd+' '+this.arrayCreateLegislature.timeEnd,
                        'president': this.arrayCreateLegislature.president,
                        'vicepresident': this.arrayCreateLegislature.vicepresident,
                        'party': this.arrayCreateLegislature.party,
                        'government': this.arrayCreateLegislature.government,
                        'color': this.arrayCreateLegislature.color,
                    })
                    .then((response) => {
                        console.log(response.data);
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    //
                } else if (action == '3') {
                    //
                }
            }
        },
    }
</script>
