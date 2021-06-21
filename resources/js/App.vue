<template>
    <div>
        <Header/>

        <main>
            <h1>Homepage</h1>
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
    body {
        font-family: sans-serif;
    }
</style>