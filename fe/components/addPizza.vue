<template>
  <div>
    <h1>Add Pizza</h1>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Name</label>
        <input
          v-model="pizza.name"
          type="text"
          id="name"
          class="form-control"
          required
        />
      </div>

      <div class="form-group">
        <label for="price">Price ($)</label>
        <input
          v-model="pizza.price"
          type="number"
          id="price"
          class="form-control"
          step="0.01"
          required
        />
      </div>

      <div class="form-group">
        <label for="category">Category</label>
        <select
          v-model="pizza.category_id"
          id="category"
          class="form-control"
          required
        >
          <option value="" disabled>Select a category</option>
          <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
          >
            {{ category.name }}
          </option>
        </select>
      </div>

      <div class="form-group">
        <label for="crust">Crust</label>
        <select
          v-model="pizza.crust_id"
          id="crust"
          class="form-control"
          required
        >
          <option value="" disabled>Select a crust</option>
          <option v-for="crust in crusts" :key="crust.id" :value="crust.id">
            {{ crust.name }}
          </option>
        </select>
      </div>

      <div class="form-group">
        <label for="topping">Topping</label>
        <select v-model="pizza.topping_id" id="topping" class="form-control">
          <option value="" disabled>Select a topping</option>
          <option
            v-for="topping in toppings"
            :key="topping.id"
            :value="topping.id"
          >
            {{ topping.name }}
          </option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary mt-3">Add Pizza</button>
    </form>
    <p v-if="errorMessage" class="text-danger">{{ errorMessage }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pizza: {
        name: "",
        price: "",
        category_id: null,
        crust_id: null,
        topping_id: null,
      },
      categories: [],
      crusts: [],
      toppings: [],
      errorMessage: "",
    };
  },
  async created() {
    await this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const [categoriesResponse, crustsResponse, toppingsResponse] =
          await Promise.all([
            this.$axios.get("/categories"),
            this.$axios.get("/crusts"),
            this.$axios.get("/toppings"),
          ]);

        if (categoriesResponse.data) this.categories = categoriesResponse.data;
        if (crustsResponse.data) this.crusts = crustsResponse.data;
        if (toppingsResponse.data) this.toppings = toppingsResponse.data;
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },
    async submitForm() {
      try {
        await this.$axios.post("/pizzas", this.pizza);
        this.$emit("item-added");
      } catch (error) {
        if (
          error.response &&
          error.response.data &&
          error.response.data.error
        ) {
          this.errorMessage = error.response.data.error;
        } else {
          this.errorMessage =
            "An error occurred while adding the pizza. Please try again later.";
        }
        console.error("Error adding pizza:", error);
      }
    },
  },
};
</script>

<style scoped>
</style>
