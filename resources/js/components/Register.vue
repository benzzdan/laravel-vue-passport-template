<template>
        <section class="hero">
            <div class="hero-body">
        <div class="container" style="width: 82vh">
                <h1 class="title">Register an account</h1>
                <h3 class="subtitle">or if you have already an account <router-link to="/login">Login</router-link></h3>

                <div class="field">
                     <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Name" v-model="name">
                        <span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                        </span>
                    </p>
                    <p v-if="errors.name" class="help is-danger">{{ errors.name[0] }}</p>
                </div>
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email" v-model="email">
                    <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                    </span>
                </p>
                <p v-if="errors.email" class="help is-danger">{{ errors.email[0]}}</p>
                </div>
                <div class="field">
                <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password" v-model="password">
                    <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                    </span>
                </p>
                <p v-if="errors.password" class="help is-danger">{{ errors.password[0]}}</p>
                </div>
                <div class="field">
                <p class="control w-100">
                    <button @click="register" class="button is-success">
                        Register
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
                name: '',
                email: '',
                password: '',
                errors: {}
            }
        },
        created(){
            Event.$emit('navbarFalse');
        },
        methods: {
            register(){
                axios.post('api/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                })
                .then(response => {
                    console.log(response)
                    console.log('it was a success')
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                })
            }
        }
    }
</script>
