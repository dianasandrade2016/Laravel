// EditComponent.vue

<template>
  <div>
    <h1>Edit User</h1>
    <form @submit.prevent="updateUsuario">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nome:</label>
            <input type="text" class="form-control" v-model="user.nome">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Last Name:</label>
              <textarea class="form-control" v-model="user.sobrenome" rows="5"></textarea>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          user: {}
        }
      },
      created() {
        let uri = `/user/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.user = response.data;
        });
      },
      methods: {
        updateUser() {
          let uri = `/user/update/${this.$route.params.id}`;
          this.axios.user(uri, this.user).then((response) => {
            this.$router.push({name: 'usuarios'});
          });
        }
      }
    }
</script>