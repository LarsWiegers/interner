<template>
    <layout>
        <h1 class="text-2xl font-semibold mb-3">{{internship.title}}
            <internship-pill class="internship-pill"
                             :state="realInternship.state"
                             v-on:updateInternshipState="updateInternship"
            ></internship-pill>
        </h1>
        <p>{{realInternship.description}}</p>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import InternshipPill from "../Shared/InternshipPill";

    export default {
        props: {
            internship: Object
        },
        data() {
            return {
                realInternship: this.internship
            }
        },
        components: {
            'internship-pill': InternshipPill,
            Layout,
        },
        methods: {
            updateInternship(state) {
                let internship = Object.assign({}, this.internship);
                internship.state = state.newState;
                axios.put('/internships/' + internship.id, internship)
                .then((internship) => {
                    this.realInternship = internship.data;
                })
            }
        }
    }
</script>
