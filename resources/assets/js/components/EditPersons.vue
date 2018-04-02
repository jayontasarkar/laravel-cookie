<template>
    <div>
        <form role="form" @submit.prevent="submit">
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" id="" v-model="name">
            </div>

            <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" class="form-control" id="" v-model="email">
            </div>

            <div class="form-group">
                <label for="">DOB</label>
                <input type="date" class="form-control" id="" v-model="dob">
            </div>
        
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['url', 'id'],
        data() {
            return {
                name: '',
                email: '',
                dob: ''
            }
        },
        methods: {
            submit () {
                axios.patch('/v2/api/persons/' + this.id, {
                    name: this.name,
                    email: this.email,
                    dob: this.dob
                }).then((response)=> {
                    window.location.href = this.url
                })
            }
        },
        mounted() {
            axios.get('/v2/api/persons/' + this.id).then((response)=> {
                this.name = response.data.data.name
                this.email = response.data.data.email
                this.dob = response.data.data.dob
            })
        }
    }
</script>
