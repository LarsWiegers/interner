<template>
    <layout>
        <h1 class="text-2xl font-semibold mb-3">{{internship.title}}
            <internship-pill class="internship-pill"
                             :state="realInternship.state"
                             v-on:updateInternshipState="updateInternship"
            ></internship-pill>
        </h1>
        <p>{{realInternship.description}}</p>
        <div class="font-sans">
            <div class="bg-white my-8 border border-grey-light" v-for="comment in comments">
                <div class="flex pt-4 px-4">
                    <div class="px-2 pt-2 flex-grow">
                        <header>
                            <div class="text-xs text-grey flex items-center my-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="h-4 w-4 mr-1 feather feather-calendar">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span v-bind:title="comment.created_at">{{comment.how_long_ago}}</span>
                            </div>
                        </header>
                        <article class="py-4 text-grey-darkest">
                            {{comment.text}}
                        </article>
                    </div>
                </div>
            </div>
            <div class="bg-grey-lighter">
                <textarea class="w-full border border-blue rounded" v-model="newComment"></textarea>
                <div class="flex justify-end items-center mt-2">
                    <button class="py-2 px-4 bg-white border border-blue rounded rounded-full
          hover:bg-blue float-right" v-on:click="addComment">
                        Add button
                    </button>
                </div>
            </div>
        </div>
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
                realInternship: this.internship,
                newComment: '',
                comments: this.internship.comments
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
                        this.comments = internship.data.comments;
                    })
            },
            addComment() {
                axios.post('/comments/', {
                    'internship_id': this.realInternship.id,
                    'text': this.newComment
                })
                    .then((comment) => {
                        this.comments.push(comment.data);
                    })
            }
        }
    }
</script>
