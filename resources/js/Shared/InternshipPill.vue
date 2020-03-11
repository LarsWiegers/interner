<template>
    <span class="relative">
        <button v-bind:class="'bg-'+ state.colour + '-500 ' + ' hover:bg-' + state.colour + '-700'"
                class="text-white py-2 px-2 rounded-full text-xl transition-background duration-300">
            {{state.title}}
            <button v-on:click="toggleDropdown" v-bind:class="{'hidden': !shouldShowDropdown}"><i class="fas fa-chevron-down"></i></button>
        </button>
        <ul class="absolute top-auto mt-2 rounded left-0 bg-white border-solid border-4 border-gray-600 border right-0"
            v-bind:class="{'hidden': !dropdownOpen}">
            <li class="pl-2 pt-4 pb-4 pr-2 border-solid border-1 text-center" v-for="state in states">
                <button v-on:click="updateInternship(state)">{{state}}</button>
            </li>
        </ul>
    </span>

</template>

<script>
export default {
    props: {
        state: Object,
        shouldShowDropdown: {
            default: true,
            type: Boolean
        }
    },
    data() {
        return {
            dropdownOpen: false,
            states: []
        }
    },
    mounted() {
        axios.get('/internships/states')
            .then((states) => {
                this.states = states.data;
            })
    },
    methods: {
        toggleDropdown() {
            this.dropdownOpen = !this.dropdownOpen;
        },
        updateInternship(state) {
            this.$emit('updateInternshipState', {
                'newState': state
            })
        }
    }
}
</script>
