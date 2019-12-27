<template>
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
</template>

<script>
export default {
  name: 'Login'
}
</script>

<style scoped>

</style>
