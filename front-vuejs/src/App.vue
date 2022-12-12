<script setup>
  import { RouterLink, RouterView } from 'vue-router'
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