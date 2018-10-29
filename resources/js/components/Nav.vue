<template>
    <div>
        <nav v-if="navbar" class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
            <router-link to="/register" class="button is-primary" v-if="!loggedIn">
                 <strong>Register</strong>
            </router-link>
          <router-link to="/login" class="button is-light" v-if="!loggedIn">Login</router-link>
          <a @click="logout" class="button is-ligth" v-if="loggedIn">Logout</a>
        </div>
      </div>
    </div>
  </div>
</nav>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                navbar: true,
                token : localStorage.getItem('access_token') || null,
            }
        },
        created(){
            //use to verify with Login and register pages that the navbar should not be displayed, will investigate better ways to do this, with vuex perhaps?
            Event.$on('navbarFalse', ($status) => {
                this.navbar = false
            })
            Event.$on('navbarTrue', ($status) => {
                this.navbar = true
            })

            //Event that registers the token emitted from the Login component
            Event.$on('token', ($token) => {
                let token = $token
                this.token = token
            })
        },
        methods : {
            //logout method, it removes the token from localStorage and also redirects the user to the landing or home page
            logout() {
                axios.defaults.headers.common['Authorization'] = 'Bearer ' +  localStorage.getItem('access_token')
                axios.post('api/logout', {
                })
                .then(response => {
                    localStorage.removeItem('access_token')
                    this.token = null
                    this.$router.push('/')
                })
                .catch(error=>{
                    console.log(error);
                })
            }
        },
        computed: {
            //This is used to check if there is a token
            loggedIn(){
                if(this.token !== null ){
                    return true
                }
                return false
            }
        }
    }
</script>
