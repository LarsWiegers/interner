<template>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" v-bind:for="label">
            {{label}}
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text"
            :id="id"
            :placeholder="label"
            v-bind:value="value"
            v-on:input="updateValue($event.target.value)">
    </div>
</template>

<script>
export default {
    props: {
        id: {
            type: String
        },
        label: {
            type: String,
            required: true
        },
        value: {
            type: String
        },
        required: {
            type: Boolean,
            default: false
        }
    },

    methods: {
        updateValue: function (value) {
            this.$emit('input', value)
        }
    }
}
</script>
