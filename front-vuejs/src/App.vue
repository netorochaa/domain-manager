<script setup>
import DomainIndex from './views/Domain/Index.vue'
import DomainCreate from './views/Domain/Create.vue'
</script>

<template>

  <div class="container">
    <div class="row">
      <div class="col-4">
        <DomainCreate />
      </div>
      <div class="col-8">
        <DomainIndex />
      </div>
    </div>
  </div>
  <!-- <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <RouterLink to="/domains">Domains</RouterLink>
      </nav>
    </div>
  </header> -->

  <!-- <RouterView /> -->
</template>