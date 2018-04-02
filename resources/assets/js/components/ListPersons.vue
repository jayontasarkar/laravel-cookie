<template>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Date of Birth</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="person, key in persons">
                    <td>{{ person.name }}</td>
                    <td>{{ person.email }}</td>
                    <td>{{ person.dob }}</td>
                    <td>
                        <a @click="edit(key)"  style="cursor: pointer;" class="btn btn-info btn-sm">Edit</a>
                        &nbsp;||&nbsp;
                        <a @click="remove(key)"  style="cursor: pointer;" class="btn btn-danger btn-sm">Remove</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                persons: []
            }
        },
        methods: {
            edit(key) {
                window.location.href= "/persons/" + key + "/edit"
            },
            remove(key) {
                axios.delete('/v2/api/persons/' + key).then((response)=> {
                window.location.href= "/persons"
            })
            }
        },
        mounted() {
            axios.get('/v2/api/persons').then((response)=> {
                this.persons = response.data
            })
        }
    }
</script>
