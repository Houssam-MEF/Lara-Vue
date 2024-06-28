<template>

</template>

<script>
import Navbar from '@/Components/Navbar.vue';

export default {
    components: {
        Navbar
    },
    props: {
        subjects: {
            type: Array,
            required: true
        }
    },
    created() {
        console.log(this.subjects);
    }
}

</script>

<style scoped>
/* Home page styles */
#homepage-container {
    background-color: red;
}
</style>
