<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
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
                        <th v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(legislature, index) in this.legislatures" :key="index">
                        <td v-bind:style="'background-color: '+legislature.color+';'">{{ legislature.number }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'" v-if="legislature.election != null">{{ legislature.election }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'" v-else> - </td>
                        <td v-bind:style="'background-color: '+legislature.color+';'">{{ legislature.begin }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'" v-if="legislature.end != null">{{ legislature.end }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'" v-else> - </td>
                        <td v-bind:style="'background-color: '+legislature.color+';'">{{ legislature.president }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'">{{ legislature.party }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'">{{ legislature.government }}</td>
                        <td v-bind:style="'background-color: '+legislature.color+';'">{{ legislature.vicepresident }}</td>
                        <td v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
                            <button class="button is-link" v-on:click="showModal('2', legislature.id)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="button is-danger ml-1" v-on:click="showModal('3', legislature.id)"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalcreateLegislature">
            <div class="modal-background" v-on:click="hideModal('1')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-landmark mr-2"></i> Legislature Create</p>
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
                            <input class="input is-dark" type="date" v-model="this.arrayCreateLegislature.election">
                            <span class="icon is-small is-left">
                                <i class="fas fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Begin</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date" v-model="this.arrayCreateLegislature.begin">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">End</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date" v-model="this.arrayCreateLegislature.end">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
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
            <div class="modal-background" v-on:click="hideModal('2')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-landmark mr-2"></i> Legislature {{ this.arrayDataLegislature.number }}</p>
                <button class="delete" aria-label="close" v-on:click="hideModal('2')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Number of legilature</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="number" v-model="this.arrayDataLegislature.number">
                            <span class="icon is-small is-left">
                                <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Election</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="date" v-model="this.arrayDataLegislature.election">
                            <span class="icon is-small is-left">
                                <i class="fas fa-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field is-horizontal">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Begin</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date" v-model="this.arrayDataLegislature.begin">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">End</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="date" v-model="this.arrayDataLegislature.end">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar"></i>
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
                                    <input class="input is-dark" type="text" placeholder="President" v-model="this.arrayDataLegislature.president">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Vicepresident</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="Vicepresident" v-model="this.arrayDataLegislature.vicepresident">
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
                                    <input class="input is-dark" type="text" placeholder="Party" v-model="this.arrayDataLegislature.party">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-handshake"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Government</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input is-dark" type="text" placeholder="Government" v-model="this.arrayDataLegislature.government">
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
                            <input class="input is-dark" type="color" v-model="this.arrayDataLegislature.color">
                            <span class="icon is-small is-left">
                                <i class="fas fa-paintbrush"></i>
                            </span>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="actions('2', this.arrayDataLegislature.id)">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                    <button class="button is-light" v-on:click="hideModal('2')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modaldeleteLegislature">
            <div class="modal-background" v-on:click="hideModal('3')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-circle-exclamation mr-2"></i> Warning! Legislature Delete</p>
                <button class="delete" aria-label="close" v-on:click="hideModal('3')"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to legislature delete {{ this.arrayDataLegislature.number }}?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-danger" v-on:click="actions('3', this.arrayDataLegislature.id)">Legislature Delete <i class="fa-solid fa-trash-can ml-2"></i></button>
                    <button class="button is-light" v-on:click="hideModal('3')">Cancel</button>
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
                yourrole: '',
                legislatures: [],
                arrayDataLegislature: [],
                arrayCreateLegislature2: {
                    'number': '',
                    'election': '',
                    'begin': '',
                    'end': '',
                    'president': '',
                    'vicepresident': '',
                    'party': '',
                    'government': '',
                    'color': '',
                },
                arrayCreateLegislature: [],
            }
        },
        mounted() {
            this.getYourRole();
            this.listLegislatures();
        },
        methods: {
            getYourRole() {
                axios.get('/your-role')
                .then((response) => {
                    this.yourrole = response.data;
                })
                .catch(error => {
                    //console.log(error);
                });
            },
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
                    axios.get('/legislature/last')
                    .then((response) => {
                        this.arrayCreateLegislature = response.data;
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    document.getElementById("modalupdateLegislature").classList.add('is-active');
                    this.dataLegislature(id);
                } else if (action == '3') {
                    document.getElementById("modaldeleteLegislature").classList.add('is-active');
                    this.dataLegislature(id);
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
                        'election': this.arrayCreateLegislature.election,
                        'begin': this.arrayCreateLegislature.begin,
                        'end': this.arrayCreateLegislature.end,
                        'president': this.arrayCreateLegislature.president,
                        'vicepresident': this.arrayCreateLegislature.vicepresident,
                        'party': this.arrayCreateLegislature.party,
                        'government': this.arrayCreateLegislature.government,
                        'color': this.arrayCreateLegislature.color,
                    })
                    .then((response) => {
                        document.getElementById("modalcreateLegislature").classList.remove('is-active');
                        this.listLegislatures();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    axios.put('/legislatures/'+id, {
                        'number': this.arrayDataLegislature.number,
                        'election': this.arrayDataLegislature.election,
                        'begin': this.arrayDataLegislature.begin,
                        'end': this.arrayDataLegislature.end,
                        'president': this.arrayDataLegislature.president,
                        'vicepresident': this.arrayDataLegislature.vicepresident,
                        'party': this.arrayDataLegislature.party,
                        'government': this.arrayDataLegislature.government,
                        'color': this.arrayDataLegislature.color,
                    })
                    .then((response) => {
                        document.getElementById("modalupdateLegislature").classList.remove('is-active');
                        this.listLegislatures();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '3') {
                    axios.delete('/legislatures/'+id)
                    .then((response) => {
                        document.getElementById("modaldeleteLegislature").classList.remove('is-active');
                        this.listLegislatures();
                    })
                    .catch((error) => {
                        //
                    });
                }
            }
        },
    }
</script>
