<template>

            <div class="main-card mb-3  bg-dark ">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover table-dark ">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(group , index ) in section.groups" :key="index">
                            <td class="text-center text-muted">#{{group.id}}</td>
                            <td>
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">{{group.name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{section.name}}</td>
                            <td class="text-center">
                                <a :href="'groups/'+group.id+'/edit/'" class="btn btn-info">Edit</a>
                            </td>
                            <td class="text-center">
                                <button @click="destroy(group)" type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                            <td class="text-center">
                                <a :href="'group_timetabeling/'+group.id"  onclick='myFunction(window.open("","Ratting","width=800,height=800,left=150,top=200,toolbar=0,status=0,"))' class="btn btn-dark">Timetabeling</a>
                                <!--  <a onclick='myFunction(  window.open("{{URL::to('group_timetabeling/'.group.id)}}","Ratting","width=800,height=800,left=150,top=200,toolbar=0,status=0,"))' class="mt-1 btn btn-warning">Timetabeling</a>-->
                            </td>
                        </tr>
                        </tbody>
                    </table>

                <div class="d-block text-center card-footer"></div>
            </div>
</template>
<script>
    import notifModal from '../elements/notifModal'

    export default {
        props : ['section'],
        components : {
            notifModal
        },
        created() {
            console.log(this.section)
        },

        methods:{
            destroy (group) {
                // console.log('group' , group)
                axios.delete(`groups/${group.id}`)
                    .then(res => {
                        // console.log('res >>>' , res);
                        this.section.groups = this.section.groups.filter(grp => grp.id != group.id )
                    }).catch(err => {
                        console.log('err >>>' , err);
                    })

            },
            myFunction(){

            }
        }
    }
</script>
