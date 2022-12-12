<template>
  <div class="d-flex flex-column">
    <header class="title">
      <h1>Domains</h1>
    </header>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Tld</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="domain in domains" :key="domain.id">
          <td>{{ domain.id }}</td>
          <td>{{ domain.name }}</td>
          <td>{{ domain.tld }}</td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    data(){
      return {
        domains: []
      }
    },

    created(){
      this.axios
        .get('http://localhost:8000/api/domains/')
        .then(records => {
          this.domains = records.data
        })
    }
  }
</script>
