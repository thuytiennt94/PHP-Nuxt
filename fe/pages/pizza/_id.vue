<template>
  <div class="container">
    <h1>Edit Pizza</h1>
    <form @submit.prevent="updatePizza">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" v-model="form.name" class="form-control" required />
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <select v-model="form.category_id" class="form-control" required>
          <option v-for="category in categories" :key="category.id" :value="category.id">
            {{ category.name }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="crust">Crust</label>
        <select v-model="form.crust_id" class="form-control" required>
          <option v-for="crust in crusts" :key="crust.id" :value="crust.id">
            {{ crust.name }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="toppings">Toppings</label>
        <select v-model="form.topping_id" class="form-control" multiple>
          <option v-for="topping in toppings" :key="topping.id" :value="topping.id">
            {{ topping.name }}
          </option>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" v-model="form.price" class="form-control" required />
      </div>
      <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: '',
        category_id: null,
        crust_id: null,
        topping_id: [],
        price: null,
      },
      categories: [],
      crusts: [],
      toppings: [],
    };
  },
  async fetch() {
    const pizzaId = this.$route.params.id;
    const [pizzaRes, categoriesRes, crustsRes, toppingsRes] = await Promise.all([
      this.$axios.get(`/pizzas/${pizzaId}`),
      this.$axios.get('/categories'),
      this.$axios.get('/crusts'),
      this.$axios.get('/toppings'),
    ]);

    this.form = pizzaRes.data;
    this.categories = categoriesRes.data;
    this.crusts = crustsRes.data;
    this.toppings = toppingsRes.data;
  },
  methods: {
    async updatePizza() {
      const pizzaId = this.$route.params.id;
      await this.$axios.put(`/pizzas/${pizzaId}`, this.form);
      this.$router.push('/pizza');
    },
  },
};
</script>

<style scoped>
.container {
  max-width: 600px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 20px;
}

.btn-success {
  margin-top: 10px;
}
</style>
