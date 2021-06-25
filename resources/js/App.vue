<template>
    <div>
        <Header/>

        <main>
            
            
        </main>

    </div>
</template>

<script>
import axios from 'axios';
import Header from './components/Header.vue';

export default {
    name: 'App',
    components: {
        Header
    },
}
</script>

<style lang="scss">
@import '../sass/utilities';

    body {
        font-family: sans-serif;
    }

    .navigation {
        .active-page{
            background: lightgreen;
        }
    }

</style>