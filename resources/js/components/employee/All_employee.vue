<template>
  <div class="container">
    <div class="card mt-4">
      <div class="card-header border-bottom-0 p-3">
        <router-link class="text-decoration-none" to="/home">Dashboard</router-link><span class="text-muted"> /
        All Employee</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "All_employee",
  mounted() {
    if (!User.loggedIn()) {
      this.$router.push({ name: "LoginForm" });
    }
  },
  data() {
    return {};
  },
}
</script>

<style></style>