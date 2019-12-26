<template>
  <div id="app">

    <!-- Основной шаблон -->
    <!-- если будешь всё удалять в этом шаблоне, не забудь оставить <router-view> :)-->
    <section v-if="showDefaultLayout">
      <header>HEADER</header>
      <h2>Default Layout</h2>
      <main>
        <router-view/>
      </main>
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </section>

    <!-- Шаблон для страницы авторизации -->
    <!-- если будешь всё удалять в этом шаблоне, не забудь оставить <router-view> :)-->
    <section v-if="showSignInLayout">
      <main>
        <router-view/>
      </main>
    </section>

  </div>
</template>

<script>
export default {
  name: 'app',
  computed: {
    showDefaultLayout () {
      return !this.$route.meta.layout
    },
    showSignInLayout () {
      return this.$route.meta.layout === 'signup'
    }
  }
}
</script>
