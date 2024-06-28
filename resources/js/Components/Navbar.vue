<template>
    <nav>
        <ul>
            <li><inertia-link href="/">Home</inertia-link></li>
            <li><inertia-link href="/about">About</inertia-link></li>
            <li><inertia-link href="/contact">Contact</inertia-link></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'Navbar'
}
</script>

<style scoped>
/* Navbar styles */
nav {
    background-color: #333;
    color: white;
    padding: 10px;
}

ul {
    list-style-type: none;
    padding: 0;
}

ul li {
    display: inline;
    margin-right: 10px;
}

ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

ul li a:hover {
    text-decoration: underline;
}
</style>
