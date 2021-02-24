<template>
    <div>

        <div class="card">
            <div class="card-header">Data Logs: <button class="float-right btn btn-secondary" v-on:click="refresh()"> Refresh Data From Live</button></div>

            <div class="card-body">

                <table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>

                    <tr v-for="record in data">
                        <td>{{ record['id'] }}</td>
                        <td>{{ record['fname'] }}</td>
                        <td>{{ record['lname'] }}</td>
                        <td>{{ record['email'] }}</td>
                        <td>{{ record['date'] }}</td>
                    </tr>

                </table>


            </div>
        </div>



    </div>
</template>

<script>
import axios from "axios";

export default {

    data:function(){
        return{
            data: []
        }
    },
    methods: {

        /**
         * Refresh the table data.
         */
        refresh()
        {
            axios.get('/refresh')
                .then((response) => {
                    console.log(response.data);
                    this.getData()
                });
        },

        /**
         * Get the table data.
         */
        getData()
        {
            axios.get('/get-data')
                .then((response) => {
                    console.log(response.data);
                    this.data = response.data;

                    // case for if there was no data
                    console.log(this.data.length)
                    if (this.data.length <= 0)
                    {
                        this.refresh()
                    }
                });
        },

    },

    /**
     * Get data on load
     */
    mounted() {
        this.getData()
    }
}
</script>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
