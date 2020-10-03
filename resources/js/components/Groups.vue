<template>
    <div>
        <!--     heloo {{selectedYear}}-->

        <multiselect
            v-model="selectedSection"
            :options="Sections"
            placeholder="Select Section"
            track-by="name"
            label="name"
        ></multiselect><br>

        <sectiontable v-if="selectedSection" :year="selectedSection"></sectiontable>

    </div>
</template>
<script>

    import multiselect  from "vue-multiselect";
    import grouptable  from "./groupsTable";

    export default {
        components :{
            multiselect, grouptable
        },
        props : ['sections'] ,
        data(){
            return {
                selectedSection: null,
            }
        },
        methods : {
            getGroups () {
                console.log(`get from db sections of `  , this.selectedSection.name)
            }
        }

    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
