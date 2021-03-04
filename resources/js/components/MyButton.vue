<template>
    <div>
        <button :type="type" class="my-button" v-text="text"></button>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    props: ["text", "type"]
};
</script>

<style>
.my-button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    font-weight: bold;
}
</style>
