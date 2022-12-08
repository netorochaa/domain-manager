<template>
  <div class="card" style="width: 100%;">
    <div class="alert alert-danger" role="alert" v-if="response.error">
      Something went wrong! <br />
      {{ error }}
    </div>
    <div class="alert alert-danger" role="alert" v-if="response.success">
      Domain saved!
    </div>

    <div class="card-header">
      <h5 class="card-title">{{ action }} domain</h5>
    </div>

    <form name="create.domain" @submit.prevent="save">
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
        response: {
          error: false,
          success: false,
          message: ''
        },
        domain: {
          name: '',
          tld: ''
        }
      }
    },

    methods: {
      save(){
        axios.post('http://localhost:8000/api/domains', Object.values(user.value))
          .then((res) => {
            this.response.success = true
          })
          .catch((error) => {
            this.response.error = true
            this.response.message = error.data.message
          })
      }
    }
  }
</script>

<style>
</style>
