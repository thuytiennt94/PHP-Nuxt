<template>
  <div class="container">
    <div class="head-page">
      <h1>Category</h1>
      <button @click="showAddForm = !showAddForm" :class="['btn', showAddForm ? 'btn-danger' : 'btn-primary']">
        {{ showAddForm ? "Cancel" : "Add" }}
      </button>
    </div>
    <add
      v-if="showAddForm"
      @item-added="fetchCategories"
      itemType="Category"
      apiUrl="/categories"
    />
    <ul>
      <li v-for="category in categories" :key="category.id">
        {{ category.name }}
      </li>
    </ul>
  </div>
</template>

<script>
import Add from "@/components/add.vue";

export default {
  name: "Category",
  components: {
    Add,
  },
  data() {
    return {
      categories: [],
      showAddForm: false,
    };
  },
  async fetch() {
    this.fetchCategories();
  },
  methods: {
    async fetchCategories() {
      const response = await this.$axios.get("/categories");
      this.categories = response.data;
    },
  },
};
</script>

<style scoped>

</style>
