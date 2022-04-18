//require('./bootstrap');

import { createApp } from 'vue';

import Contact from './components/Contact.vue';

import Dashboard from './components/Dashboard.vue';

import CrudUsers from './components/CrudUsers.vue';

import CrudCandidates from './components/CrudCandidates.vue';

import CrudMessages from './components/CrudMessages.vue';

import CrudHistory from './components/CrudHistory.vue';

import CrudInstitutions from './components/CrudInstitutions.vue';

import CrudLaws from './components/CrudLaws.vue';

import Results from './components/Results.vue';

import Pactometer from './components/Pactometer.vue';

const app  = createApp({});

app.component("contact", Contact);

app.component("dashboard", Dashboard);

app.component("crud-users", CrudUsers);

app.component('crud-candidates', CrudCandidates);

app.component('crud-messages', CrudMessages);

app.component('crud-history', CrudHistory);

app.component('crud-institutions', CrudInstitutions);

app.component('crud-laws', CrudLaws);

app.component('results', Results);

app.component('pactometer', Pactometer);

app.mount("#app");
