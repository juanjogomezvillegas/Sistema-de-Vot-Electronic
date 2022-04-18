<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5" v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-dark" type="text" placeholder="Name" v-model="this.createInstitution.name">
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-building-columns"></i>
                    </span>
                </div>
            </div>
            <div class="field ml-4">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-dark" type="text" placeholder="Sector" v-model="this.createInstitution.sector">
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-box-archive"></i>
                    </span>
                </div>
            </div>
            <div class="field ml-4">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-dark" type="text" placeholder="Location" v-model="this.createInstitution.location">
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                </div>
            </div>
            <div class="ml-6">
                <button class="button is-link" v-on:click="this.getCreateInstitution()">Institution Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
            </div>
        </div>
        <div class="table-container is-flex is-justify-content-center" v-if="this.countInstitutions > 0">
            <table class="table is-bordered is-striped is-narrow is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Name">Name</abbr></th>
                        <th><abbr title="Sector">Sector</abbr></th>
                        <th><abbr title="Location">Location</abbr></th>
                        <th v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(institution, index) in this.institutions" :key="index">
                        <td>{{ institution.name }}</td>
                        <td>{{ institution.sector }}</td>
                        <td>{{ institution.location }}</td>
                        <td v-if="this.yourrole == 'administrator' || this.yourrole == 'manager'">
                            <button class="button is-danger ml-1" v-on:click="this.getDeleteInstitution(institution.id)"><i class="fa-solid fa-trash-can"></i></button>
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
        name: 'CrudInstitutions',
        data() {
            return {
                countInstitutions: 0,
                yourrole: '',
                institutions: [],
                createInstitution: {
                    'name': '',
                    'sector': '',
                    'location': ''
                }
            }
        },
        mounted() {
            this.getYourRole();
            this.getCountInstitutions();
            this.listInstitutions();
        },
        methods: {
            listInstitutions() {
                axios.get('/api/institutions')
                .then((response) => {
                    this.institutions = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            getCreateInstitution() {
                axios.post('/institutions/create', {
                    'name': this.createInstitution.name,
                    'sector': this.createInstitution.sector,
                    'location': this.createInstitution.location
                })
                .then((response) => {
                    this.createInstitution = {
                        'name': '',
                        'sector': '',
                        'location': ''
                    };
                    this.getCountInstitutions();
                    this.listInstitutions();
                })
                .catch((error) => {
                    //
                });
            },
            getDeleteInstitution(id) {
                axios.delete('/institutions/'+id)
                .then((response) => {
                    this.listInstitutions();
                })
                .catch((error) => {
                    //
                });
            },
            getCountInstitutions() {
                axios.get('/api/count-institutions')
                .then((response) => {
                    this.countInstitutions = response.data;
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
