<template>
    <div class="card mt-4">
        <!--Post Title-->
        <div class="card-header">
            <h1 class="roboto-text">{{ post.title }}</h1>
            <small>
                {{ post.category ? post.category.name : "no category" }}
            </small>
        </div>
        <!--Post Body-->
        <div class="card-body">
            <div class="d-flex">
                <p class="monserrat-text flex-grow-1">
                    {{ post.content }}
                </p>
            </div>
            <blockquote class="blockquote mb-0">
                <!--Post Footer-->
                <div class="card-footer d-flex justify-content-between">
                    <small>
                        {{ post.author ? post.author.name : "no author" }}
                    </small>
                    <small class="font-weight-light">{{
                        getDate(post.created_at)
                    }}</small>
                </div>
            </blockquote>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: ["post"],
    methods: {
        //recupero la data nel formato
        getDate(date) {
            let postDate = new Date(date);
            let day = postDate.getDate();
            if (day < 10) {
                day = "0" + day;
            }
            let month = postDate.getMonth();
            if (month < 10) {
                month = "0" + month;
            }
            const year = postDate.getFullYear();
            return `${month}-${day}-${year}`;
        }
    }
};
</script>

<style></style>
