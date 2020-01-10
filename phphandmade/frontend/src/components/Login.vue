<template>
  <form class="dropdown-menu text-center"
       aria-labelledby="navbarDropdown" @submit.prevent="signIn">
    <div class="form-group m-2 text-center">
      <label>
        <input id="#username" autofocus="" name="username" type="text" class="form-control" placeholder="Имя пользователя" v-model="username">
      </label>
      <div id="user_error1" class="error text-muted text-center" style="font-size: small" v-if="$v.username.$anyError && !$v.username.required">Заполните «Имя пользователя»</div>
      <div id="user_error2" class="error text-muted text-center"  style="font-size: small" v-if="$v.username.$anyError && !$v.username.alpha">Имя пользователя должно состоять только из латинских букв</div>
    </div>

    <div class="form-group m-2 text-center">
      <label>
        <input id="#password" name="password" type="password" class="form-control" placeholder="Пароль" v-model="password">
      </label>
      <div id="password_error1" class="error text-muted text-center" style="font-size: small" v-if="$v.password.$anyError && !$v.password.required">Проверьте пароль.</div>
      <div id="password_error2" class="error text-muted" v-if="result">{{result}}</div>
    </div>

    <div class="form-group m-2">
      <button id="#login_button" class="btn btn-outline-info btn-sm btn-block" type="submit">Войти</button>
    </div>
  </form>
</template>

<script>// eslint-disable-next-line no-unused-vars
import { HTTP } from '../components/http'
import { required, alpha } from 'vuelidate/src/validators'

export default {
  name: 'Login',
  data () {
    return {
      username: '',
      password: '',
      result: ''
    }
  },
  validations: {
    username: {
      required,
      alpha
    },
    password: {
      required
    }
  },
  methods: {
    signIn () {
      this.$v.$touch()
      if (!this.$v.$invalid) {
        this.auth()
      }
    },
    auth () {
      this.result = ''

      HTTP.post('/user/signin', {
        username: this.username,
        password: this.password
      }).then((response) => {
        localStorage.setItem('user', JSON.stringify(response.data))
        location.reload()
      }, (error) => {
        this.result = error.response.data.password
      })
    }
  }
}
</script>

<style scoped>

</style>
