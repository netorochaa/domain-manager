<template>
  <div class="card" style="width: 100%;">
    <div class="alert alert-danger" role="alert" v-if="errorMessage">
      Something went wrong! <br />
      {{ errorMessage }}
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
        errorMessage: '',
        domain: {}
      }
    },

    created(){
      if(this.$route.params.id){
        this.axios
          .get(`http://localhost:8000/api/domains/${this.$route.params.id}/edit`)
          .then((res) => {
              this.domain = res.data;
          });

          this.action = 'Update'
      }
    },

    methods: {
      save(){
        let url = 'http://localhost:8000/api/domains'
        let method = 'post'

        if(this.$route.params.id){
          url = `${url}/${this.$route.params.id}`
          method = 'put'
        }

        this.axios({
          method: method,
          url: url,
          data: this.domain
        })
          .then((res) => this.redirectToHome())
          .catch((error) => {
            this.errorMessage = error.response.data.message
          })
      },
      redirectToHome(){
        this.$router.push({ name: 'home' })
      },
      
    }
  }
</script>

<style>
</style>
