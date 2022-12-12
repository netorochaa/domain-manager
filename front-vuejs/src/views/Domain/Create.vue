<script setup>
  import axios from 'axios'
</script>

<template>
  <div class="card" style="width: 100%;">
    <div class="alert alert-danger" role="alert" v-if="errorMessage">
      Something went wrong! <br />
      {{ errorMessage }}
    </div>

    <div class="card-header">
      <h5 class="card-title">{{ action }} domain</h5>
    </div>

    <form name="create.domain" @submit.prevent="store">
      <div class="card-body">
        <div class="mb-3">
          <label for="domain.name" class="form-label">Name</label>
          <input type="text" id="domain.name" v-model="domain.name" class="form-control" required>
        </div>


        <div class="mb-3">
          <label for="domain.tld" class="form-label">TLD</label>
          <input type="text" id="domain.tld" v-model="domain.tld" class="form-control" required>
        </div>
      </div>
  
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        action: 'Create',
        errorMessage: '',
        domain: {
          name: '',
          tld: ''
        }
      }
    },

    methods: {
      store(){
        this.axios
          .post('http://localhost:8000/api/domains', this.domain)
          .then((res) => (
            this.$router.push({ name: 'home' })
          ))
          .catch((error) => {
            this.errorMessage = error
            console.log('tudo errado: ' + error)
          })
      }
    }
  }
</script>

<style>
</style>
