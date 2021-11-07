<template>
    <b-navbar toggleable="lg" type="light" variant="light">
      <b-container>
        <b-navbar-brand href="#">Jellow VUE</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-navbar-nav>
          <b-nav-item :to="{ path: '/' }" href="#">Users</b-nav-item>
        </b-navbar-nav>
      </b-container>
    </b-navbar>
</template>

<script>
export default {
  name: 'Navbar',
  props: {
    msg: String
  }
}
</script>