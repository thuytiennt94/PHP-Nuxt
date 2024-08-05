<template>
  <div>
    <h1>Crust</h1>
    <button @click="showAddForm = !showAddForm">
      {{ showAddForm ? "Cancel" : "Add" }}
    </button>
    <add v-if="showAddForm" @item-added="fetchCrusts" itemType="Crust" apiUrl="/crust"/>
    <ul>
      <li v-for="crust in crusts" :key="crust.id">{{ crust.name }}</li>
    </ul>
  </div>
</template>

<script>
import Add from '@/components/add.vue';

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
      const response = await this.$axios.get("/crust");
      this.crusts = response.data;
    }
  }
};
</script>
