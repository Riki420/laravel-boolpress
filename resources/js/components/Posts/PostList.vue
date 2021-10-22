<template>
    <section id="postList" class="mt-4">
        <h1 class="roboto-text">Post</h1>
        <Loader v-if="isLoading" />
        <div>
            <hr />

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
            <hr />
        </div>
    </section>
</template>

<script>
import PostCard from "./PostCard.vue";
import Pagination from "./Pagination.vue";
import Loader from "../Loader.vue";
export default {
    name: "PostPage",
    components: {
        PostCard,
        Pagination,
        Loader
    },
    data() {
        return {
            posts: [],
            pagination: [],
            isLoading: false
        };
    },
    methods: {
        //getPost
        getPosts(page) {
            this.isLoading = true;
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
                })
                .then(() => {
                    this.isLoading = false;
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
