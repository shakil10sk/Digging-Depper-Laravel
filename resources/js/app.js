import Vue from 'Vue';
import counter from './components/counter.vue';

require('./bootstrap');

// Vue.component('counter','./components/counter.vue')


new Vue({
        el:'#app',
        counter
            
    })