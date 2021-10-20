<template>
    <section id="postList" class="mt-4">
        <h2>Post</h2>
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
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
            posts: []
        };
    },
    methods: {
        //getPost
        getPosts() {
            axios
                .get("http://localhost:8000/api/posts")
                .then(res => {
                    this.posts = res.data.posts;
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
