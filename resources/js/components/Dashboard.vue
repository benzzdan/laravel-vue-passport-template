<template>
    <div>
        This is the dashboard page
    </div>
</template>
<script>
    export default {
        data() {
            return {
                token: localStorage.getItem('access_token')
            }
        },
        created(){
            Event.$emit('navbarTrue');
            if(this.token == null) {
                this.$router.push('/')
            }
        }
    }
</script>
