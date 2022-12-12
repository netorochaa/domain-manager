<template>
  <div class="d-flex flex-column">

    <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="deleted">
      Domain deleted!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

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
          <td>
            <div class="btn-group" role="group">
                <router-link :to="{name: 'edit', params: { id: domain.id }}" class="btn btn-success">Edit</router-link>
                <button class="btn btn-danger" @click="deleteDomain(domain.id)">Delete</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    data(){
      return {
        deleted: false,
        domains: []
      }
    },

    created(){
     this.getDomains()
    },

    methods: {
      deleteDomain(id){
        this.axios
          .delete(`http://localhost:8000/api/domains/${id}`)
          .then(response => {
            this.getDomains()
            this.deleted = true
          });
      },
      async getDomains(){
        await this.axios
          .get('http://localhost:8000/api/domains/')
          .then(records => {
            this.domains = records.data
          })
      }
    }
  }
</script>
