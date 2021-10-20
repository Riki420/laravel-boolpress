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
                <div class="card-footer">
                    <time>
                        <p>{{ post.created_at }}</p>
                    </time>
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
