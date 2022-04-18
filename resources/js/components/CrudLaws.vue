<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-dark" type="text" placeholder="Name" v-model="this.createLaw.name">
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-building-columns"></i>
                    </span>
                </div>
            </div>
            <div class="field ml-4">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-dark" type="text" placeholder="Sector" v-model="this.createLaw.sector">
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                </div>
            </div>
            <div class="field ml-4">
                <div class="control">
                    <div class="select">
                        <select v-model="this.createLaw.type">
                            <option value="">Select to one Option</option>
                            <option value="constitution">Constitution</option>
                            <option value="treaty">Treaty</option>
                            <option value="coin">Coin</option>
                            <option value="law">Law</option>
                            <option value="reform">Reform</option>
                            <option value="decree">Decree</option>
                            <option value="regulation">Regulation</option>
                            <option value="emergency">Emergency</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="ml-6">
                <button class="button is-link" v-on:click="this.getCreateLaws()">Law Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
            </div>
        </div>
        <div class="table-container is-flex is-justify-content-center" v-if="this.countLaws > 0">
            <table class="table is-bordered is-striped is-narrow is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Name">Name</abbr></th>
                        <th><abbr title="Sector">Sector</abbr></th>
                        <th><abbr title="Type">Type</abbr></th>
                        <th v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(law, index) in this.laws" :key="index">
                        <td>{{ law.name }}</td>
                        <td>{{ law.sector }}</td>
                        <td>{{ law.type }}</td>
                        <td v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
                            <button class="button is-danger ml-1" v-on:click="this.getDeleteLaws(law.id)"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudLaws',
        data() {
            return {
                countLaws: 0,
                yourrole: '',
                laws: [],
                createLaw: {
                    'name': '',
                    'sector': '',
                    'type': ''
                }
            }
        },
        mounted() {
            this.getYourRole();
            this.getCountLaws();
            this.listLaws();
        },
        methods: {
            listLaws() {
                axios.get('/api/laws')
                .then((response) => {
                    this.laws = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            getCreateLaws() {
                axios.post('/laws/create', {
                    'name': this.createLaw.name,
                    'sector': this.createLaw.sector,
                    'type': this.createLaw.type
                })
                .then((response) => {
                    this.createLaw = {
                        'name': '',
                        'sector': '',
                        'type': ''
                    };
                    this.getCountLaws();
                    this.listLaws();
                })
                .catch((error) => {
                    //
                });
            },
            getDeleteLaws(id) {
                axios.delete('/laws/'+id)
                .then((response) => {
                    this.listLaws();
                })
                .catch((error) => {
                    //
                });
            },
            getCountLaws() {
                axios.get('/api/count-laws')
                .then((response) => {
                    this.countLaws = response.data;
                })
                .catch((error) => {
                    //
                });
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
