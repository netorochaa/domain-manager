<script setup>
import DomainIndex from './views/Domain/Index.vue'
import DomainCreate from './views/Domain/Create.vue'
</script>

<template>
  <div class="container"> 
    <ul class="nav nav-tabs">
      <RouterLink class="nav-item nav-link" to="/">Domains list</RouterLink>
      <RouterLink class="nav-item nav-link" to="/create">Create Domain</RouterLink>
    </ul>

    <RouterView />
  </div>
</template>