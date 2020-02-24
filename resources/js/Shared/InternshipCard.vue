<template>
    <li class="row">
        <inertia-link class="flex content-center justify-between my-4" v-bind:href="internship.url">
            <h2 class="block">{{internship.title}}</h2>
        <internship-pill class="internship-pill" :state="internship.state"></internship-pill>
        </inertia-link>
    </li>
</template>
<script>
    import InternshipPill from "./InternshipPill";

    export default {
        props: {
            internship: Object,
        },
        data() {
            return {}
        },
        components: {
            'internship-pill': InternshipPill
        }
    }
</script>
