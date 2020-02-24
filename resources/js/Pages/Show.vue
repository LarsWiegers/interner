<template>
    <layout>
        <h1 class="text-2xl font-semibold mb-3">{{internship.title}}
            <internship-pill class="internship-pill" :state="internship.state"></internship-pill>
        </h1>
        <p>{{internship.description}}</p>

    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import InternshipPill from "../Shared/InternshipPill";

    export default {
        props: {
            internship: Object
        },
        components: {
            'internship-pill': InternshipPill,
            Layout,
        }
    }
</script>
