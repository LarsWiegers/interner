<template>
    <button v-bind:class="'bg-'+ state.colour + '-500'"
            class=" hover:bg-blue-700 text-white py-2 px-2 rounded-full">
        {{state.title}}
    </button>
</template>

<script>
export default {
    props: {
        state: Object,
    },
    data() {
        return {
        }
    }
}
</script>
