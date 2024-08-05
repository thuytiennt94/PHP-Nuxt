<template>
  <div class="container">
    <div class="head-page">
      <h1>Pizzas</h1>
      <button
        @click="showAddForm = !showAddForm"
        :class="['btn', showAddForm ? 'btn-danger' : 'btn-primary']"
      >
        {{ showAddForm ? "Cancel" : "Add" }}
      </button>
    </div>
    <AddPizza v-if="showAddForm" @item-added="fetchPizza" />
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Crust</th>
          <th scope="col">Topping</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(pizza, index) in pizzas" :key="pizza.id">
          <td>{{ index + 1 }}</td>
          <td>{{ pizza.name }}</td>
          <td>{{ pizza.price }}$</td>
          <td>{{ pizza.category.name }}</td>
          <td>{{ pizza.crust.name }}</td>
          <td>{{ pizza.toppings.name }}</td>
          <td>
            <button class="btn btn-primary" @click="editPizza(pizza.id)">
              Edit
            </button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import AddPizza from "@/components/addPizza.vue";

export default {
  name: "Pizza",
  components: {
    AddPizza,
  },
  data() {
    return {
      pizzas: [],
      showAddForm: false,
    };
  },
  async fetch() {
    this.fetchPizza();
  },
  methods: {
    async fetchPizza() {
      const response = await this.$axios.get("/pizzas");
      this.pizzas = response.data;
    },
    editPizza(id) {
      console.log("Navigating to edit page for pizza with id:", id);
      this.$router.push(`/pizza/${id}`);
    },
  },
};
</script>

<style scoped>
tr > th {
  width: 140px;
  text-align: center;
}

tr > td {
  text-align: center;
}
</style>
