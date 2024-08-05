<template>
  <div>
    <header>
      <nav>
        <ul>
          <li>
            <Nuxt-link to="/">Home</Nuxt-link>
          </li>
          <li>
            <Nuxt-link to="/category">Category</Nuxt-link>
          </li>
          <li>
            <Nuxt-link to="/topping">Topping</Nuxt-link>
          </li>
          <li>
            <Nuxt-link to="/crust">Crust</Nuxt-link>
          </li>
          <li>
            <Nuxt-link to="/pizza">Pizza</Nuxt-link>
          </li>
        </ul>
      </nav>
    </header>
    <Nuxt />
  </div>
</template>

<style>
header {
  background: #333;
  padding: 10px;
}

nav ul {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
}

nav li {
  margin-right: 20px;
}

nav a {
  color: white;
  text-decoration: none;
}
</style>
