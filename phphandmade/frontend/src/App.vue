<template>
  <div id="app">

    <section v-if="showDefaultLayout">
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <router-link class="navbar-brand" to="/">
            <span style="color: skyblue">MADE</span>
            <span style="color: lightpink">HANDMADE</span>
          </router-link>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"/>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <router-link class="nav-link" to="/dreamcatchers">Ловцы снов</router-link>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFirst" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Фенечки
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Прямое плетение</a>
                  <a class="dropdown-item" href="#">Косое плетение</a>
                </div>
              </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" v-if="!isUserAutorized">
              <ul class="navbar-nav mr-auto mr-10">
                <li class="nav-item dropdown mr-md-4">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSecond" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Вход
                  </a>
                  <Login/>
                </li>
                <li class="nav-item mr-md-2">
                  <router-link class="nav-link" to="/signup">Регистрация</router-link>
                </li>
              </ul>
            </form>
            <form class="form-inline mt-2 mt-md-0" v-else>
              <ul class="navbar-nav mr-auto mr-10">
                <li class="nav-item">
                  <a class="nav-link"> Привет, {{name}}! </a>
                </li>
                <li class="nav-item mr-md-2">
                  <a class="nav-link" role="button" v-on:click="signOut">Выход</a>
                </li>
              </ul>
            </form>
          </div>
        </nav>
      </header>
      <main>
        <router-view/>
      </main>
      <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
          <p class="text-center">
            Корякин Александр ВТ-41
            <svg id="i-github" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="32" height="32">
              <path stroke-width="0" fill="currentColor" d="M32 0 C14 0 0 14 0 32 0 53 19 62 22 62 24 62 24 61 24 60 L24 55 C17 57 14 53 13 50 13 50 13 49 11 47 10 46 6 44 10 44 13 44 15 48 15 48 18 52 22 51 24 50 24 48 26 46 26 46 18 45 12 42 12 31 12 27 13 24 15 22 15 22 13 18 15 13 15 13 20 13 24 17 27 15 37 15 40 17 44 13 49 13 49 13 51 20 49 22 49 22 51 24 52 27 52 31 52 42 45 45 38 46 39 47 40 49 40 52 L40 60 C40 61 40 62 42 62 45 62 64 53 64 32 64 14 50 0 32 0 Z" />
            </svg>
            Браткова Ирина ПВ-41
            <svg id="i-github" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="32" height="32">
              <path stroke-width="0" fill="currentColor" d="M32 0 C14 0 0 14 0 32 0 53 19 62 22 62 24 62 24 61 24 60 L24 55 C17 57 14 53 13 50 13 50 13 49 11 47 10 46 6 44 10 44 13 44 15 48 15 48 18 52 22 51 24 50 24 48 26 46 26 46 18 45 12 42 12 31 12 27 13 24 15 22 15 22 13 18 15 13 15 13 20 13 24 17 27 15 37 15 40 17 44 13 49 13 49 13 51 20 49 22 49 22 51 24 52 27 52 31 52 42 45 45 38 46 39 47 40 49 40 52 L40 60 C40 61 40 62 42 62 45 62 64 53 64 32 64 14 50 0 32 0 Z" />
            </svg>
            <svg id="i-twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="32" height="32">
              <path stroke-width="0" fill="currentColor" d="M60 16 L54 17 L58 12 L51 14 C42 4 28 15 32 24 C16 24 8 12 8 12 C8 12 2 21 12 28 L6 26 C6 32 10 36 17 38 L10 38 C14 46 21 46 21 46 C21 46 15 51 4 51 C37 67 57 37 54 21 Z" />
            </svg>
          </p>

          <p class="text-center">2019</p>
        </div>
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
import Login from './components/Login'
export default {
  data () {
    return {
      name: '',
      user: null,
      userString: ''
    }
  },
  name: 'app',
  components: { Login },
  computed: {
    showDefaultLayout () {
      return !this.$route.meta.layout
    },
    showSignInLayout () {
      return this.$route.meta.layout === 'signup'
    },
    isUserAutorized () {
      // eslint-disable-next-line vue/no-side-effects-in-computed-properties
      this.userString = localStorage.getItem('user')
      if (this.userString === null) {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.name = ''
        return false
      } else {
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.name = JSON.parse(this.userString, this.user).name
        return true
      }
    }
  },
  methods: {
    signOut () {
      localStorage.removeItem('user')
      location.reload()
    }
  }
}
</script>
