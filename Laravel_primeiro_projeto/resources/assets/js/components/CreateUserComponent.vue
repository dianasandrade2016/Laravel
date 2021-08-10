// CreateUser.vue

<template>
  <div>
    <h1>Create A User</h1>
    <form @submit.prevent="addUser">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" v-model="user.nome">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Last Name:</label>
            <input type="text" class="form-control" v-model="user.sobrenome">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>E-mail:</label>
              <input type="text" class="form-control" v-model="user.email">
            </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Password:</label>
              <input type="text" class="form-control" v-model="user.senha">
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          user:{}
        }
    },
    methods: {
      addUser(){
        let uri = '/user/create'
        this.axios.post(uri, this.user ).then(function (response){

          console.log(response.data)
        }).catch(function (res) {
          console.log(res)
        })

      }
    }
  }
</script>
