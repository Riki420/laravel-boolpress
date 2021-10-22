<template>
    <div class="loader">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only text-light"></span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Loader"
};
</script>

<style lang="scss" scoped>
.loader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 3;
    .spinner-border {
        height: 50px;
        width: 50px;
    }
}
</style>
