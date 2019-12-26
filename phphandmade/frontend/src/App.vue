<template>
  <div id="app">

    <section v-if="showDefaultLayout">
      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">
            <span style="color: skyblue">MADE</span>
            <span style="color: lightpink">HANDMADE</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"/>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Ловцы снов</a>
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
            <form class="form-inline mt-2 mt-md-0">
              <ul class="navbar-nav mr-auto mr-10">
                <li class="nav-item dropdown mr-md-4">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSecond" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Вход
                  </a>
                  <div class="dropdown-menu" style="margin-left: -75px"
                       aria-labelledby="navbarDropdown" >
                    <div class="form-group m-2">
                      <label>
                        <input autofocus="" name="login" type="text" class="form-control" placeholder="Имя пользователя">
                      </label>
                    </div>

                    <div class="form-group m-2">
                      <label>
                        <input name="password" type="password" class="form-control" placeholder="Пароль">
                      </label>
                    </div>

                    <div class="form-group m-2">
                      <button class="btn btn-outline-info btn-sm btn-block" type="submit">Войти</button>
                    </div>
                  </div>
                </li>
                <li class="nav-item mr-md-2">
                  <a class="nav-link" href="views/SignUp.vue">Регистрация</a>
                </li>
              </ul>
            </form>
          </div>
        </nav>
      </header>
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
