<template>
    <article class="border-b">
        <div class="border-l-2 border-transparent overflow-hidden">
            <header class="flex justify-between p-5 pl-8 pr-8 cursor-pointer select-none">
                            <span class="text-grey-darkest font-thin text-xl flex justify-between flex-1">
                                <span  v-on:click="toggleDropdown">{{internship.title}}</span>
                                 <internship-pill class="internship-pill flex items-end mr-4"
                                                  :should-show-dropdown="false"
                                                  :state="internship.state"></internship-pill>
                            </span>

                <div class="rounded-full border border-grey w-8 h-8 flex items-center justify-center" v-on:click="toggleDropdown">
                    <!-- icon by feathericons.com -->
                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="6 9 12 15 18 9">
                        </polyline>
                    </svg>
                </div>
            </header>
            <div v-bind:class="{'h-0': !dropdownOpen, 'h-100': dropdownOpen}" class="transition duration-300 origin-top-left transform">
                <div class="pl-8 pr-8 pb-5 text-grey-darkest">
                    <p class="mb-4">{{internship.description}}</p>
                    <inertia-link v-bind:href="'/internships/' + internship.id" class="flex-no-shrink p-2 border-2 rounded text-grey border-grey hover:bg-grey">View</inertia-link>
                </div>
            </div>
        </div>
    </article>
</template>
<script>
    import InternshipPill from "./InternshipPill";

    export default {
        props: {
            internship: Object,
        },
        data() {
            return {
                dropdownOpen: false,
            }
        },
        components: {
            'internship-pill': InternshipPill
        },
        methods: {
            toggleDropdown() {
                this.dropdownOpen = !this.dropdownOpen;
            }
        }
    }
</script>
