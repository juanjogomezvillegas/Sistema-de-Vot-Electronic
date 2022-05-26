<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5">
            <button class="button is-black" v-on:click="this.showModal('1', 0)">User Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
        </div>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                <thead class="has-background-grey-light">
                    <tr>
                        <th class="has-text-centered"><abbr title="User Icon">#</abbr></th>
                        <th class="has-text-centered"><abbr title="User Full Name">Full Name</abbr></th>
                        <th class="has-text-centered"><abbr title="User Email">Email</abbr></th>
                        <th class="has-text-centered"><abbr title="User Role">Role</abbr></th>
                        <th class="has-text-centered">Actions</th>
                    </tr>
                </thead>
                <tbody class="has-background-white-ter">
                    <tr v-for="(user, index) in this.users" :key="index">
                        <td class="is-flex is-justify-content-center">
                            <figure class="image is-32x32">
                                <img class="is-rounded" v-bind:src="user.icon" v-bind:alt="'avatar user '+user.id">
                            </figure>
                        </td>
                        <td class="has-text-centered">{{ user.name }} {{ user.lastname }}</td>
                        <td class="has-text-centered"><a v-bind:href="'mailto:'+user.email">{{ user.email }}</a></td>
                        <td class="has-text-centered">{{ user.role }}</td>
                        <td class="has-text-left">
                            <button class="button is-link" v-on:click="this.showModal('2', user.id)"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button class="button is-danger ml-1" v-on:click="this.showModal('3', user.id)"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal" id="modalcreateuser">
            <div class="modal-background" v-on:click="this.hideModal('1')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-user-plus mr-2"></i> User Create</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('1')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="name" v-model="this.arrayUserCreate.name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Lastname</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="lastname" v-model="this.arrayUserCreate.lastname">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="email" placeholder="example@election.daw" v-model="this.arrayUserCreate.email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Role</label>
                        <div class="control">
                            <div class="select is-dark is-fullwidth">
                                <select v-model="this.arrayUserCreate.role">
                                    <option value="">Select to one Option</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="manager">Manager</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="password" placeholder="*********" v-model="this.arrayUserCreate.password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="this.actions('1', 0)">User Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('1')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modalupdateuser">
            <div class="modal-background" v-on:click="this.hideModal('2')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-user mr-2"></i> {{ this.arrayDataUser.name }} {{ this.arrayDataUser.lastname }}</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('2')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="name" v-model="this.arrayDataUser.name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Lastname</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="text" placeholder="lastname" v-model="this.arrayDataUser.lastname">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-dark" type="email" placeholder="example@election.daw" v-model="this.arrayDataUser.email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Role</label>
                        <div class="control">
                            <div class="select is-dark is-fullwidth">
                                <select v-model="this.arrayDataUser.role">
                                    <option value="">Select to one Option</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="manager">Manager</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-link" v-on:click="this.actions('2', this.arrayDataUser.id)">Save Changes <i class="fa-solid fa-floppy-disk ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('2')">Cancel</button>
                </footer>
            </div>
        </div>
        <div class="modal" id="modaldeleteuser">
            <div class="modal-background" v-on:click="this.hideModal('3')"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                <p class="modal-card-title"><i class="fa-solid fa-circle-exclamation mr-2"></i> Warning! User Delete</p>
                <button class="delete" aria-label="close" v-on:click="this.hideModal('3')"></button>
                </header>
                <section class="modal-card-body">
                    Are you sure want to user delete {{ this.arrayDataUser.name }} {{ this.arrayDataUser.lastname }}?
                </section>
                <footer class="modal-card-foot is-flex is-justify-content-end">
                    <button class="button is-danger" v-on:click="this.actions('3', this.arrayDataUser.id)">User Delete <i class="fa-solid fa-trash-can ml-2"></i></button>
                    <button class="button is-light" v-on:click="this.hideModal('3')">Cancel</button>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudUsers',
        data() {
            return {
                users: [],
                arrayDataUser: [],
                arrayUserCreate: {
                    'name': '',
                    'lastname': '',
                    'email': '',
                    'role': '',
                    'password': ''
                }
            }
        },
        mounted() {
            this.listUsers();
        },
        methods: {
            listUsers() {
                axios.get('/users/all')
                .then((response) => {
                    this.users = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            showModal(action, id) {
                if (action == '1') {
                    document.getElementById("modalcreateuser").classList.add('is-active');
                } else if (action == '2') {
                    document.getElementById("modalupdateuser").classList.add('is-active');
                    this.dataUser(id);
                } else if (action == '3') {
                    document.getElementById("modaldeleteuser").classList.add('is-active');
                    this.dataUser(id);
                }
            },
            hideModal(action) {
                if (action == '1') {
                    document.getElementById("modalcreateuser").classList.remove('is-active');
                } else if (action == '2') {
                    document.getElementById("modalupdateuser").classList.remove('is-active');
                } else if (action == '3') {
                    document.getElementById("modaldeleteuser").classList.remove('is-active');
                }
            },
            dataUser(id) {
                axios.get('/user/'+id)
                .then((response) => {
                    this.arrayDataUser = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            actions(action, id) {
                if (action == '1') {
                    axios.post('/user/create', {
                        'name': this.arrayUserCreate.name,
                        'lastname': this.arrayUserCreate.lastname,
                        'email': this.arrayUserCreate.email,
                        'role': this.arrayUserCreate.role,
                        'password': this.arrayUserCreate.password,
                    })
                    .then((response) => {
                        document.getElementById("modalcreateuser").classList.remove('is-active');
                        this.listUsers();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '2') {
                    axios.put('/user/'+id, {
                        'name': this.arrayDataUser.name,
                        'lastname': this.arrayDataUser.lastname,
                        'email': this.arrayDataUser.email,
                        'role': this.arrayDataUser.role,
                    })
                    .then((response) => {
                        document.getElementById("modalupdateuser").classList.remove('is-active');
                        this.listUsers();
                    })
                    .catch((error) => {
                        //
                    });
                } else if (action == '3') {
                    axios.delete('/user/'+id)
                    .then((response) => {
                        document.getElementById("modaldeleteuser").classList.remove('is-active');
                        this.listUsers();
                    })
                    .catch((error) => {
                        //
                    });
                }
            }
        }
    }
</script>
