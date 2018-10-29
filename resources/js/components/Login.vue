<template>
        <section class="hero">
            <div class="hero-body">
        <div class="container" style="width: 82vh">
                <h1 class="title">Please Login</h1>
                 <h3 class="subtitle">or <router-link to="/register">create an account</router-link></h3>
                <p v-if="error !== null" class="help is-danger">{{ error }}</p>

            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email" v-model="username">
                    <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                    </span>
                </p>
                <p v-if="errors.email" class="help is-danger">{{ errors.email[0] }}</p>
                </div>
                <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password" v-model="password">
                    <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                    </span>
                </p>
                <p v-if="errors.password" class="help is-danger">{{ errors.password[0] }}</p>
                </div>
                <div class="field">
                <p class="control w-100">
                    <button @click="login" class="button is-success">
                        Login
                    </button>
                </p>
            </div>
        </div>
            </div>
        </section>
</template>
<script>
    export default {
        data(){
            return {
                username: '',
                password: '',
                errors: {},
                error: null
            }
        },
        created(){
            //Sens the emit event to state that the navgar shoud not be visible on the navbar component
            Event.$emit('navbarFalse');
        },
        methods: {
            login() {
                this.errors = {}
                this.error = null
                axios.post('api/login', {
                    username: this.username,
                    password: this.password
                })
                .then(response=> {
                    this.errors = {}
                    // console.log(response)
                    //Getting the token and saving it on local storage
                    const token = response.data.access_token
                    localStorage.removeItem('access_token')
                    localStorage.setItem('access_token', token)
                    Event.$emit('token', token);
                    //redirecting to dashboard page
                    this.$router.push('/dashboard');
                })
                .catch(error=> {
                    if(error.response.data.errors){
                        this.errors = error.response.data.errors
                    }else if(error.response.data.message) {
                        this.error = error.response.data.message
                    }
                })
            }
        }
    }
</script>
