<template>
    <section id="postList" class="mt-4">
        <h2>Post</h2>
        <Pagination
            :lastPage="pagination.lastPage"
            :currentPage="pagination.currentPage"
            @onPageChange="changePage"
        />
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
        <Pagination
            :lastPage="pagination.lastPage"
            :currentPage="pagination.currentPage"
            @onPageChange="changePage"
        />
    </section>
</template>

<script>
import PostCard from "./PostCard.vue";
import Pagination from "./Pagination.vue";
export default {
    name: "PostPage",
    components: {
        PostCard,
        Pagination
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
        },
        changePage(page) {
            this.getPosts(page);
        }
    },
    created() {
        this.getPosts();
    }
};
</script>
