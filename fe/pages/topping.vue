<template>
  <div class="container">
    <div class="head-page">
      <h1>Toppings</h1>
      <button @click="showAddForm = !showAddForm" :class="['btn', showAddForm ? 'btn-danger' : 'btn-primary']">
        {{ showAddForm ? "Cancel" : "Add" }}
      </button>
    </div>
    <add
      v-if="showAddForm"
      @item-added="fetchToppings"
      itemType="Topping"
      apiUrl="/toppings"
    />
    <ul>
      <li v-for="topping in toppings" :key="topping.id">
        {{ topping.name }}
      </li>
    </ul>
  </div>
</template>

<script>
import Add from "@/components/add.vue";

export default {
  name: "Toppings",
  components: {
    Add,
  },
  data() {
    return {
      toppings: [],
      showAddForm: false,
    };
  },
  async fetch() {
    this.fetchToppings();
  },
  methods: {
    async fetchToppings() {
      const response = await this.$axios.get("/toppings");
      this.toppings = response.data;
    },
  },
};
</script>

<style scoped>

</style>
