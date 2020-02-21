<template>
  <layout>
    <ul>
        <internship-card v-for="internship in internships" v-bind:key="internship.id" :internship="internship"></internship-card>
    </ul>
  </layout>
</template>

<script>
import Layout from '@/Shared/Layout'
import InternshipCard from "../Shared/InternshipCard";
export default {
    props: {
        internships: Array,
    },
  components: {
    Layout,
      InternshipCard
  },
}
</script>
