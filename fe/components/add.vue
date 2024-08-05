<!-- src/components/AddForm.vue -->
<template>
  <div>
    <h2>Add {{ itemType }}</h2>
    <form @submit.prevent="addItem">
      <div>
        <label for="name">{{ itemType }} Name:</label>
        <input type="text" v-model="itemName" required />
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    itemType: {
      type: String,
      required: true,
    },
    apiUrl: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      itemName: '',
    };
  },
  methods: {
    async addItem() {
      try {
        const response = await this.$axios.post(this.apiUrl, { name: this.itemName });
        this.$emit('item-added', response.data);
        this.itemName = '';
        this.$router.push(`/${this.itemType}`);
      } catch (error) {
        console.error(`Error adding ${this.itemType.toLowerCase()}:`, error);
      }
    },
  },
};
</script>

<style scoped>
/* Add your styles here */
</style>
