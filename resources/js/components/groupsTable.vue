<template>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Groups </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                                <button type="button" id="PopoverCustomT-0" class="btn btn-primary btn-sm">Details</button>
                            </td>
                            <td class="text-center">
                                <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
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
        props : ['section'],
        created() {
            console.log(this.section)
        }
    }
</script>
