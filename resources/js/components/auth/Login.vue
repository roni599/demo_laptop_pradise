<template>
  <div id="layoutAuthentication mt-5">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                  <form @submit.prevent="login">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com"
                        v-model="form.email" />
                      <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                      <label for="inputEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Password"
                        v-model="form.password" />
                      <label for="inputPassword">Password</label>
                      <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                    </div>
                    <div class="form-check mb-3">
                      <input class="form-check-input" id="inputRememberPassword" type="checkbox" />
                      <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                      <router-link to="/forget">Forgot Password?</router-link>
                      <button class="btn btn-primary">Login</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">
                    <!-- <a href="register.html">Need an account? Sign up!</a> -->
                    <router-link to="/register">Need an account? Sign up</router-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Login-From",
  mounted() {
    if (User.loggedIn()) {
      this.$router.push({ name: "Home" });
    }
  },
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: {}
    };
  },
  methods: {
    async login() {
      await axios
        .post("/api/auth/login", this.form)
        .then((res) => {
          User.responseAfterLogin(res);
          Toast.fire({
            icon: "success",
            title: "Signed in successfully"
          });
          this.$router.push({ name: "Home" });
        })
        .catch((error) => {
          this.errors = error.response.data.errors
          Toast.fire({
            icon: "warning",
            title: "Invalid emial or password"
          })
        })
    },
  },
};
</script>

<style></style>