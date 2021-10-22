<template>
    <section id="postList" class="mt-4">
        <h2>Post</h2>
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
        <nav
            aria-label="Page navigation example"
            class="mt-4 d-flex justify-content-end"
        >
            <ul class="pagination">
                <li
                    class="page-item"
                    v-if="pagination.currentPage > 1"
                    @click="getPosts(pagination.currentPage - 1)"
                >
                    <a class="page-link" href="#">Previous</a>
                </li>
                <li
                    class="page-item"
                    v-if="pagination.lastPage > pagination.currentPage"
                    @click="getPosts(pagination.currentPage + 1)"
                >
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </section>
</template>

<script>
import PostCard from "./PostCard.vue";
export default {
    name: "PostPage",
    components: {
        PostCard
    },
    data() {
        return {
            posts: [],
            pagination: []
        };
    },
    methods: {
        //getPost
        getPosts(page) {
            axios
                .get(`http://localhost:8000/api/posts?page=${page}`)
                .then(res => {
                    //recupero le proprietà data [Destructuring]
                    const { data, current_page, last_page } = res.data;
                    this.posts = data;
                    this.pagination = {
                        currentPage: current_page,
                        lastPage: last_page
                    };
                })
                .catch(err => {
                    console.error(err);
                });
        }
    },
    created() {
        this.getPosts();
    }
};
</script>

<style lang="scss" scoped>
.page-item {
    cursor: pointer;
    .page-link {
        color: #000;
    }
}
</style>
