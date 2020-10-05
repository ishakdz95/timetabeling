<template>
    <div>
        <multiselect
            v-model="selectedYear"
            :options="years"
            placeholder="Select year"
            track-by="name"
            label="name"
        ></multiselect><br>
        <multiselect v-if="selectedYear"
            v-model="selectedSection"
            :options="selectedYear.sections"
            placeholder="Select Section"
            track-by="name"
            label="name"
        ></multiselect><br>

        <groupsTable v-if="selectedSection" :section="selectedSection"></groupsTable>

    </div>
</template>
<script>
    import Multiselect from 'vue-multiselect'
    import groupsTable from "./groupsTable";
    export default {

        props : ['years'],
        components : {
            Multiselect,groupsTable
        },
        data () {
            return {
                selectedYear :'',
                selectedSection : ''
            }
        }

    }
</script>
