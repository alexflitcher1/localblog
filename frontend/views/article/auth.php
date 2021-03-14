<?php $this->title = 'Вход'; ?>
<div class="flex dir-column">
    <form id="reg-art" class="flex dir-column">
        <input type="text" class="input-std login" placeholder="Введите логин">
        <input type="password" class="input-std password" placeholder="Введите пароль">
        <input type="submit" class="input-std">
    </form>
</div>
<?php
    $js = <<<JS
        $('#reg-art').submit(function(e) {
          e.preventDefault();
          var login    = $('.login').val();
          var password = $('.password').val();
          $.ajax({
            url: '/article/check',
            method: 'get',
            data: {
              login: login,
              password: password,
            }
          }).done(function(data) {
              alert(data);
              if (data == 'Success') window.location = '/article/index';
          })
        });
JS;
    $this->registerJs($js);

?>
