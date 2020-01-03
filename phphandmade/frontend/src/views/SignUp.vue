<template>
  <div>
    <!-- ls2, -->
    <a href="/"> <img src="img/ls4.png" align="left" class="registration-img mt-0"></a>
    <div class="container" @submit.prevent="signUp">
      <div class="row registration-row justify-content-center align-items-center h-100 ml-sm-2 mr-sm-2 mb-0 mb-sm-0" >
        <form class="border border-pink shadow-lg rounded p-3 col-md-8" enctype="multipart/form-data">

          <div align="center" style="margin-bottom: 1rem">
            <span class="text-signup" >Регистрация </span>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">
                    <svg id="i-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" width="23" height="23" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M12 20 L12 30 4 30 4 12 16 2 28 12 28 30 20 30 20 20 Z" />
                    </svg>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Логин" aria-label="Логин" aria-describedby="basic-addon2" pattern="[a-zA-Z]+" v-model="login" required>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                       <svg id="i-mail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" width="23" height="23" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M2 26 L30 26 30 6 2 6 Z M2 6 L16 16 30 6" />
                        </svg>
                    </span>
                </div>
                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required v-model="email">
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon4">
                       <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" width="23" height="23" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                        </svg>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Имя" aria-label="FirstName" aria-describedby="basic-addon4" required v-model="name">
              </div>
            </div>

          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">
                       <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" width="23" height="23" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                        </svg>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Фамилия" aria-label="LastName" aria-describedby="basic-addon3" required v-model="lastName">
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon5">
                        <svg id="i-lock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" width="23" height="23" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M5 15 L5 30 27 30 27 15 Z M9 15 C9 9 9 5 16 5 23 5 23 9 23 15 M16 20 L16 23" />
                            <circle cx="16" cy="24" r="1" />
                        </svg>
                    </span>
                </div>
                <input type="password" class="form-control" placeholder="Пароль" aria-label="Password" aria-describedby="basic-addon5" required v-model="password">
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <div class="input-group">
                <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon6">
                                <svg id="i-lock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" width="23" height="23" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M5 15 L5 30 27 30 27 15 Z M9 15 C9 9 9 5 16 5 23 5 23 9 23 15 M16 20 L16 23" />
                                    <circle cx="16" cy="24" r="1" />
                                </svg>
                            </span>
                </div>
                <input type="password" class="form-control" placeholder="Подтвердите пароль" aria-label="PPassword" aria-describedby="basic-addon6" required>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12 mb-0">
              <button type="submit" class="btn btn-primary btn-lg btn-block">Зарегистрироваться</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</template>

<script>
import { HTTP } from '../components/http'

export default {
  name: 'SignUp',
  data () {
    return {
      name: '',
      lastName: '',
      login: '',
      email: '',
      password: '',
      role: ''
    }
  },
  methods: {
    signUp: function () {
      HTTP.post('/user/signup', {
        name: this.name,
        lastName: this.lastName,
        login: this.login,
        email: this.email,
        password: this.password,
        role: 'user'
      }).then((response) => {
        localStorage.setItem('user', JSON.stringify(response.data))
        location.href = '/'
      }, (error) => {
        this.result = error.response.data.password
      })
    }
  }
}
</script>

<style scoped>

</style>
