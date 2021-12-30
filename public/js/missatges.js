Vue.component('missatge-error', {
    props: ['tittle'], 
    template: '<article class="message is-danger"><div class="message-body"><span class="has-text-weight-bold">Error:</span> {{ tittle }} !!!</div></article>'
});

Vue.component('missatge-info', {
    props: ['tittle'], 
    template: '<article class="message is-success"><div class="message-body"><span class="has-text-weight-bold"></span> {{ tittle }} !!!</div></article>'
});

new Vue({
    el: '#app'
});
