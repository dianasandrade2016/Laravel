// IndexUserComponent.vue

<template>
  <div>
      <h1>Usuarios</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'createuser' }" class="btn btn-primary">Create User</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="user in usuarios" :key="user.id">
                    <td>{{ user.id }}</td>
                    <td>{{ user.nome }}</td>
                    <td>{{ user.sobrenome }}</td>
                    <td>{{ user.email }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: user.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deleteUser(user.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          usuarios: []
        }
      },
      created() {
      let uri = 'user/index';
      this.axios.get(uri).then(response => {
        this.usuarios = response.data.data;
       
        }).catch(function (res) {
          console.log(res)
        })
    },
    methods: {
      deleteUser(id)
      {
        let uri = `user/delete/${id}`;
        this.axios.delete(uri).then(response => {
          this.usuarios.splice(this.usuarios.indexOf(id), 1);
            console.log('Excluido com sucesso.')
        });
      }
    }
  }
</script>