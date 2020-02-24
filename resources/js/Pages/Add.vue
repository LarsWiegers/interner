<template>
    <layout>
        <div class="w-8/12 flex self-center m-auto">
            <form @submit.prevent="submit" action="/internships" method="post" class=" w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <in-input  v-model="title" label="Name" :required="true" id="title" />
                <in-textarea  v-model="description" label="Name" :required="true" id="description" />
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout';
    import InInput from '@/Shared/InInput';
    import inTextarea from '@/Shared/inTextarea';

    export default {
        data() {
            return {
                title: '',
                description: '',
            }
        },
        components: {
            Layout,
            InInput,
            inTextarea
        },
        methods: {
            submit() {
                this.$inertia.post('/internships', {
                    title: this.title,
                    description: this.description
                })
            },
        },
    }
</script>
