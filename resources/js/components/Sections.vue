<template>
  <div>
<!--     heloo {{selectedYear}}-->
      <h5 class="card-title text-site">Sections</h5>
      <multiselect
          v-model="selectedYear"
          :options="years"
          placeholder="Select year"
          track-by="name"
          label="name"
      ></multiselect><br>

      <sectiontable v-if="selectedYear" :year="selectedYear"></sectiontable>

  </div>
</template>
<script>

    import multiselect  from "vue-multiselect";
    import sectiontable  from "./sectionsTable";

    export default {
        components :{
            multiselect, sectiontable
        },
        props : ['years'] ,
        data(){
            return {
                selectedYear: null,
            }
        },
        methods : {
            getSections () {
                console.log(`get from db sections of `  , this.selectedYear.name)
            }
        }

    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
