<!-- <template>
  <div class="container">
    <div class="card mt-4 mb-4">
      <div class="card-header border-bottom-0 p-3">
        <router-link class="text-decoration-none" to="/home">Dashboard</router-link><span class="text-muted"> /
          All Employee</span>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Employee Table
      </div>
      <div class="card-body">
        <table id="datatablesSimple">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Join date</th>
              <th>Salary</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <td>{{ employee.name }}</td>
              <td>{{ employee.email }}</td>
              <td>{{ employee.phone }}</td>
              <td>{{ employee.address }}</td>
              <td>{{ employee.join_date }}</td>
              <td>{{ employee.salary }}</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "All_employee",
  mounted() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "LoginForm" });
    }
  },
  data() {
    return {
      employees: {}
    };
  },
  methods: {
    allEmployee() {
      axios.get('/api/employees')
        .then(({data}) => (this.employees = data))
        .catch((error) => {
          console.log(error)
        })
    }
  },
  created(){
    this.allEmployee();
  }
}
</script>

<style></style> -->

<template>
  <div class="container">
    <div class="card mt-4 mb-4">
      <div class="card-header border-bottom-0 p-3">
        <router-link class="text-decoration-none" to="/home">Dashboard</router-link><span class="text-muted"> / All
          Employee</span>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Employee Table
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Join date</th>
              <th scope="col">Salary</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <th scope="row">{{ employee.id }}</th>
              <td>{{ employee.name }}</td>
              <td>{{ employee.email }}</td>
              <td>{{ employee.phone }}</td>
              <td>{{ employee.address }}</td>
              <td>{{ employee.join_date }}</td>
              <td>
                <img :src="`/backend/images/employee/${employee.image}`" alt="Employee Image" width="55" height="55" />
              </td>
              <td>{{ employee.salary }}</td>
              <td>
                <button class="btn btn-sm btn-success">Edit</button>
                <button class="btn btn-sm btn-danger mx-2">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';


export default {
  name: "AllEmployee",
  data() {
    return {
      employees: [] // Initialize as an array
    };
  },
  methods: {
    fetchEmployees() {
      axios.get('/api/employees')
        .then(response => {
          this.employees = response.data;
          this.$nextTick(() => {
            $('#datatablesSimple').DataTable();
          });
        })
        .catch(error => {
          console.error(error);
        });
    }
  },
  mounted() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "LoginForm" });
    } else {
      this.fetchEmployees(); // Fetch employees after checking authentication
    }
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
