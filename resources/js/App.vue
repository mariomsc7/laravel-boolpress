<template>
    <div>
        <Header/>

        <main>
            <div class="container">
                <h1>BLOG</h1>
            </div>
            
        </main>
    </div>
</template>

<script>
import Header from './components/Header.vue';

export default {
    name: 'App',
    components: {
        Header
    }
}
</script>

<style lang="scss">
@import '../sass/utilities';

    body {
        font-family: sans-serif;
    }
</style>