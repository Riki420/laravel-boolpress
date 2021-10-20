<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <PostList />
            </div>
        </div>
    </div>
</template>

<script>
import PostList from "./Posts/PostList.vue";
export default {
    name: "App",
    components: {
        PostList
    }
};
</script>
