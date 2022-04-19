<template>
    <div>
        <div class="is-flex is-justify-content-center mb-5">
            <button class="button is-link">Legilature Create <i class="fa-solid fa-folder-plus ml-2"></i></button>
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
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'CrudLegislatures',
        data() {
            return {
                legislatures: [],
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
        },
    }
</script>
