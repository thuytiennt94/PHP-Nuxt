<template>
  <div class="container">
    <div class="head-page">
      <h1>Crust</h1>
      <button @click="showAddForm = !showAddForm" :class="['btn', showAddForm ? 'btn-danger' : 'btn-primary']">
        {{ showAddForm ? "Cancel" : "Add" }}
      </button>
    </div>
    <add
      v-if="showAddForm"
      @item-added="fetchCrusts"
      itemType="Crust"
      apiUrl="/crusts"
    />
    <ul>
      <li v-for="crust in crusts" :key="crust.id">{{ crust.name }}</li>
    </ul>
  </div>
</template>

<script>
import Add from "@/components/add.vue";

export default {
  name: "Crust",
  components: {
    Add,
  },
  data() {
    return {
      crusts: [],
      showAddForm: false,
    };
  },
  async fetch() {
    this.fetchCrusts();
  },
  methods: {
    async fetchCrusts() {
      const response = await this.$axios.get("/crusts");
      this.crusts = response.data;
    },
  },
};
</script>

<style scoped>

</style>
