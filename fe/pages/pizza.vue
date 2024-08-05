<template>
  <div>
    <h1>Pizzas</h1>
    <button>Add</button>
    <ul>
      <li v-for="pizza in pizzas" :key="pizza.id">{{ pizza.name }} - {{ pizza.price }}$</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pizzas: []
    }
  },
  async fetch() {
    const response = await this.$axios.get('/pizzas')
    this.pizzas = response.data
  }
}
</script>
