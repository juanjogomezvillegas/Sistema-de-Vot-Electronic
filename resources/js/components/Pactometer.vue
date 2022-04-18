<template>
    <div v-if="this.countCandidates > 0">
        <nav class="level is-desktop mb-6">
            <div class="level-item has-text-centered">
                <div>
                <p class="heading is-size-4 has-text-success">Yes</p>
                <p class="title is-2 has-text-success">{{ this.votesYes }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                <p class="heading is-size-4 has-text-danger">No</p>
                <p class="title is-2 has-text-danger">{{ this.votesNo }}</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                <p class="heading is-size-4 has-text-light">Abstention</p>
                <p class="title is-2 has-text-light">{{ this.votesAbstention }}</p>
                </div>
            </div>
        </nav>
        <div class="table-container is-flex is-justify-content-center">
            <table class="table is-bordered is-striped is-narrow is-hoverable">
                <thead class="has-background-grey-lighter">
                    <tr>
                        <th><abbr title="Color">#</abbr></th>
                        <th><abbr title="Name">Name</abbr></th>
                        <th><abbr title="Party">Party</abbr></th>
                        <th><abbr title="Seats">Seats</abbr></th>
                        <th><abbr title="Position">Position</abbr></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(candidate, index) in this.candidates" :key="index">
                        <td v-bind:style="'background-color: '+candidate.color+';'"></td>
                        <td>{{ candidate.name }}</td>
                        <td>{{ candidate.party }}</td>
                        <td>{{ candidate.seats }}</td>
                        <td>
                            <div class="select">
                                <select v-model="candidate.position" v-on:change="this.updatePosition(candidate.id, candidate.position)">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    <option value="abstention">Abstention</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="columns is-centered">
            <div class="chart-container column is-8">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Pactometer',
        data() {
            return {
                candidates: [],
                countCandidates: 0,
                totalSeats: 0,
                votesYes: 0,
                votesNo: 0,
                votesAbstention: 0,
            }
        },
        mounted() {
            this.listCandidates();
            this.getCountCandidates();
            this.refreshPosition();
        },
        methods: {
            listCandidates() {
                axios.get('/candidates-seats')
                .then((response) => {
                    this.candidates = response.data;
                    this.chartjs();
                })
                .catch((error) => {
                    //
                });
            },
            updatePosition(id, position) {
                axios.put('/candidate/position/'+id, {
                    'position': position
                })
                .then((response) => {
                    this.listCandidates();
                    this.refreshPosition();
                })
                .catch((error) => {
                    //
                });
            },
            refreshPosition() {
                axios.get('/votes-yes')
                .then((response) => {
                    this.votesYes = response.data;
                })
                .catch((error) => {
                    //
                });

                axios.get('/votes-no')
                .then((response) => {
                    this.votesNo = response.data;
                })
                .catch((error) => {
                    //
                });

                axios.get('/votes-abstention')
                .then((response) => {
                    this.votesAbstention = response.data;
                })
                .catch((error) => {
                    //
                });
            },
            chartjs() {
                let arraylabels = new Array();
                let arraydates = new Array();
                let arraycolors = new Array();

                for (let i = 0; i < this.candidates.length; i++) {
                    arraylabels.push(this.candidates[i].name);
                    arraydates.push(this.candidates[i].seats);
                    arraycolors.push(this.candidates[i].color);
                }

                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: arraylabels,
                        datasets: [{
                            data: arraydates,
                            backgroundColor: arraycolors,
                            borderWidth: 0
                        }]
                    },
                    options: {
                        responsive: true,
                        circumference: 180,
                        rotation: -90,
                        layout: {
                            autoPadding: false,
                            padding: 0
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'right'
                            }
                        }
                    }
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
