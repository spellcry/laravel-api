<template>
    <div class="container py-3">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="title text-center mb-3">{{ title }}</h1>
                <ul class="post-list">
                    <li class="list-item" v-for="post in posts" :key="post.id">                        
                        <PostCard :post="post" />
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="pagination" style="listStyleType: none; display: flex; gap: 1rem;">
                    <li @click="fetchPosts(1)" class="pages first-last">
                        &lt---                                    
                    </li>
                    <li @click="page !== current_page ? fetchPosts(page) : ''" v-for="page in current_page === 1 ? [current_page, current_page + 1, current_page + 2] : current_page === last_page ? [current_page - 2, current_page - 1, current_page] : [current_page - 1, current_page, current_page + 1]" :key="page" :class="{
                        'current' : current_page === page,
                        'not_current' : current_page !== page,
                    }" class="pages">
                            {{ page }}                
                    </li>
                    <li @click="fetchPosts(last_page)" class="pages first-last">
                        ---&gt                                    
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
import PostCard from '../components/PostCard.vue'

export default {
    data() {
        return {
            title: "Boolpress Vue",
            posts: [],
            current_page: 1,
            last_page: 0,
        };
    },
    methods: {
        fetchPosts(page = 1) {
            axios.get("/api/posts", {
                params: {
                    page: page
                }
            })
                .then((res) => {
                const { data, current_page, last_page } = res.data.result;
                this.posts = data;
                this.last_page = last_page;
                this.current_page = current_page;
            });
        },
    },
    beforeMount() {
        this.fetchPosts();
    },
    components: { PostCard }
}
</script>
<style lang="scss" scoped>
    .title {
        font-size: 4rem;
        font-weight: bold;
        color: red;
    }
    .post-list {
        list-style-type: none;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .list-item {
        flex-basis: calc(calc(100% - calc(1rem * 2)) / 3);
    }
    .pages{
        display: flex;
        justify-content: center;
        align-items: center;
        aspect-ratio: 1;
        width: 20px;
        user-select: none;
    }
    .current {
        background-color: coral;
    }
    .not_current {
        cursor: pointer;
        background-color: lightgrey;
    }
    .first-last {
        width: fit-content;
        cursor: pointer;
    }
    .pagination {
        display: flex;
        justify-content: center;
    }
</style>