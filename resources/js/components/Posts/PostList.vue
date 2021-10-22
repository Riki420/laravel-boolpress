<template>
    <section id="postList" class="mt-4">
        <h2>Post</h2>
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
        <nav aria-label="Page navigation example" class="mt-4">
            <ul class="pagination">
                <li class="page-item" v-if="pagination.current_page > 1">
                    <a class="page-link" href="#">Previous</a>
                </li>
                <li
                    class="page-item"
                    v-if="pagination.current_page === pagination.last_page"
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
        getPosts() {
            axios
                .get("http://localhost:8000/api/posts")
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

<style></style>
