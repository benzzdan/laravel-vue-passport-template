<template>
    <div>
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>

<script>
    import Nav from './Nav'

    export default {
        components: {
            'navbar' : Nav
        }
    }
</script>
