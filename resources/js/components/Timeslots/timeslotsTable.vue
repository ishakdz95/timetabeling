<template>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover table-dark">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Timeslots</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(timeslot , index ) in day.timeslots" :key="index">
                            <td class="text-center text-muted">#{{timeslot.id}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{timeslot.name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{day.name}}</td>
                            <td class="text-center">
                                <a :href="'timeslots/'+timeslot.id+'/edit/'" class="btn btn-info">Edit</a>
                            </td>
                            <td class="text-center">
                                <button @click="destroy(timeslot)" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-block text-center card-footer"></div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props : ['day'],
        created() {
            console.log('day',this.day)
        },
        methods : {
            destroy(timeslot){
                axios.delete(`timeslots/${timeslot.id}`).then(res =>{
                    console.log('response from destroy',res)
                    this.day.timeslots=this.day.timeslots.filter(ts => ts.id != timeslot.id)
                    }).catch(err =>console.log('error',err))
            }
        }
    }

</script>
