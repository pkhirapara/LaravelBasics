<template>
    <div class="container">
        <div class="row justify-content-center mb-3" ref="imageUpload"></div>
            <div class="col-12 bg-dark text-white rounded py-3 my-3 text-center">
                DROP YOUR IMAGE HERE
            </div>
    </div>
</template>

<script>

    import Dropzone from 'dropzone';

    export default {
        data: function() {
            return {
                dropzone: null
            }
        },


        mounted() {
            this.dropzone = new Dropzone(this.$refs.imageUpload, {
                url: '/api/images'
            });
        }
    }

</script>