<template>
  <v-app class="bg-white">
    <div>
      <!-- ls2, -->
      <a href="/"> <img src="img/ls4.png" align="left" class="registration-img mt-0"></a>
      <div class="container" @submit.prevent="signUp">
        <div class="row registration-row justify-content-center align-items-center h-100 m-0" >
          <form class="border border-pink shadow-lg rounded p-3 col-md-8" enctype="multipart/form-data">

            <div class="form-row row-content-center m-0">
              <div class="form-group col-md-12 m-0 p-0">
                <div align="center">
                  <span class="text-signup" >Регистрация </span>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12 m-0 p-1">
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
              <div class="form-group col-md-12 m-0 p-1">
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
              <div class="form-group col-md-12 mb-0 p-1">
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
              <div class="form-group col-md-12 mb-0 p-1">
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

            <div class="form-row row-content-center m-0 ml-5">
              <div class="form-check col-md-6 m-6">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" v-on:change="isMaster2">
                <label class="form-check-label" for="gridRadios1">Мастер</label>
              </div>
              <div class="form-check col-md-6 m-6">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" v-on:change="isLomaster2">
                <label class="form-check-label" for="gridRadios2">Просто посмотреть</label>
              </div>
            </div>

            <div class="form-row" v-if="this.isMaster == 1">
              <div class="form-group col-md-12 mb-0 p-1" style="height: 100%; width: 100%">
                <select class="custom-select" v-model="note" required>
                  <option value="Начинащзий">Начинающий</option>
                  <option value="Опытный">Опытный</option>
                  <option value="Бог">Бог</option>
                </select>
                <div class="invalid-feedback">Invalid</div>
              </div>
            </div>
            <div class="form-row" v-if="this.isMaster == 0">
              <div class="form-group col-md-12 mb-0 p-1" style="height: 100%; width: 100%">
                <select class="custom-select" v-model="note" required>
                  <option value="Ловцы снов">Люблю ловцы снов</option>
                  <option value="Прямое плетение">Люблю фенечки прямым плетением</option>
                  <option value="Косое плетение">Люблю фенечки косым плетением</option>
                  <option value="Все">Обожаю все!</option>
                </select>
                <div class="invalid-feedback">Invalid</div>
              </div>
            </div>

            <div class="form-row row-content-center">
              <div class="form-group col-md-12 mb-0 p-1">
              <textarea class="form-control" v-model="about" placeholder="Расскажите о себе..">
              </textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12 mb-0 p-1">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Выберите аватарку</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-row h-25">
              <div class="form-group col-md-12 mb-0 p-1">
                <v-autocomplete label="Выберите Ваш город. Или город, ближайший к Вам." :items="comp" ></v-autocomplete>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12 mb-0 p-1">
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
              <div class="form-group col-md-12 mb-0 p-1">
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
              <div class="form-group col-md-12 mb-0 p-1">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Зарегистрироваться</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </v-app>
</template>

<script>
import { HTTP } from '../components/http'

export default {
  name: 'SignUp',
  data () {
    return {
      comp: ['Город 312', '213 дороГ'],
      name: '',
      lastName: '',
      login: '',
      email: '',
      password: '',
      role: '',
      isMaster: null,
      note: '',
      about: ''
    }
  },
  methods: {
    isMaster2: function () {
      this.isMaster = 1
      return true
    },
    isLomaster2: function () {
      this.isMaster = 0
      return false
    },
    signUp: function () {
      HTTP.post('/user/signup', {
        name: this.name,
        lastName: this.lastName,
        login: this.login,
        email: this.email,
        password: this.password,
        role: 'user',
        isMaster: this.isMaster,
        note: this.note,
        about: this.about
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
