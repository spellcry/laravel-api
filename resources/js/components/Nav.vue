<template>
    <header class="main-header">
        <nav class="container">
            <div class="row justify-content-between">
                <div class="logo">
                    Logo
                </div>
                <ul class="nav-list">
                    <li v-for="(link, index) in navLinks" :key="index" class="list-item">
                        <router-link :to="{ name: link.name }">{{ link.text }}</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    data() {
        return {
            navLinks: [
                {
                    text: 'Home',
                    path: '/',
                    name: 'home'
                },
                {
                    text: 'Contatti',
                    path: '/contatti',
                    name: 'contact-us'
                },
                {
                    text: 'Chi Siamo',
                    path: '/chi-siamo',
                    name: 'about-us'
                },
                {
                    text: 'Blog',
                    path: '/blog',
                    name: 'posts.index'
                },
            ]
        }
    }
}
</script>
<style lang="scss" scoped>
    .main-header {
        padding-top: 1rem;
    }
    .nav-list {
        display: flex;
        list-style-type: none;
        gap: 1rem;
    }
</style>