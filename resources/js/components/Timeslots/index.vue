<template>
    <div>
        <multiselect
        v-model="selectedDay"
        :options="days"
        placeholder="Select Day"
        track-by="name"
        label="name"
    ></multiselect><br>
        <timeslots-table v-if="selectedDay" v-bind:day="selectedDay"></timeslots-table>
    </div>
</template>
<script>
    import multiselect from 'vue-multiselect'
    import timeslotsTable from "./timeslotsTable";
    export default {
        props : ['days'],
        components : {
            multiselect, timeslotsTable
        },
        data(){
            return{
                selectedDay:''
            }
        }
    }
</script>
