<template>
    <nav
        aria-label="Page navigation example"
        class="mt-4 d-flex justify-content-end"
    >
        <ul class="pagination">
            <!--Previous-->
            <li
                class="page-item"
                v-if="currentPage > 1"
                @click="$emit('onPageChange', currentPage - 1)"
            >
                <a class="page-link" href="#">Previous</a>
            </li>
            <!--Current-->
            <li
                class="page-item"
                :class="n === currentPage ? 'active' : ''"
                v-for="n in lastPage"
                :key="n"
                @click="$emit('onPageChange', n)"
            >
                <a href="#" class="page-link">{{ n }}</a>
            </li>
            <!--Next-->
            <li
                class="page-item"
                v-if="lastPage > currentPage"
                @click="$emit('onPageChange', currentPage + 1)"
            >
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: ["lastPage", "currentPage"]
};
</script>

<style scoped>
.page-item {
    cursor: pointer;
}
.page-link {
    color: #000;
}
.page-item:active .page-link {
    color: #fff;
}
</style>
