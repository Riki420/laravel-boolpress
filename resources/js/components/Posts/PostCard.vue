<template>
    <div class="card mt-4">
        <!--Post Title-->
        <div class="card-header">
            {{ post.title }}
        </div>
        <!--Post Body-->
        <div class="card-body">
            <p>
                {{ post.content }}
            </p>
            <blockquote class="blockquote mb-0">
                <!--Post Footer-->
                <div class="card-footer d-flex justify-content-between">
                    <p v-if="post.category_id" class="me-4">
                        {{ post.category.name }}
                    </p>
                    <p v-else class="me-4">No Category</p>
                    <time class="font-weight-light">{{ post.created_at }}</time>
                </div>
            </blockquote>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: ["post"]
};
</script>

<style></style>
