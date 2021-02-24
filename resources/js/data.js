import Vue from 'vue'
import axios from 'axios';

/**
 * Import components.
 */
const dataTable = require('./components/DataTable.vue').default;


let data = new Vue({
    el: '#data',
    components: {
        dataTable,
    },
    data:function(){
        return {
        }
    },

    methods: {
    },

    mounted:function(){
    },
});
