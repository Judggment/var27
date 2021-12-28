<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect("localhost", "root", "", "cirk");

if ($link == false){
    mysqli_connect_error();
}

$exit_log = 'SELECT id, datas FROM `exit_log`';
$kategorii = 'SELECT id, kategoria FROM `kategorii`';
$sale_ticket = 'SELECT id, id_ploshadki, datas, prodannie, kas_sbor FROM `sale_ticket`';
$spisok_artistov = 'SELECT id, first_name, last_name, kategoria_id, biografia, price, mesto_raboti_id FROM `spisok_artistov`';
$spisok_cirk_ploshadok = 'SELECT id, name, adres FROM `spisok_cirk_ploshadok`';

$kategoria = $_POST['kategiria'];
$names = $_POST['names'];

switch ($_POST['table']) {
    case "exit_log":
        $sql = $exit_log;
        $vvod = "exit_log";
        break;
    case "kategorii":
        $sql = $kategorii;
        $vvod = "kategorii";
        if ($kategoria) {
          $zapros = "SELECT * FROM `kategorii` WHERE `kategoria` LIKE ('%".$kategoria."%')";
        }
        break;
    case "sale_ticket":
        $sql = $sale_ticket;
        $vvod = "sale_ticket";
        break;
    case "spisok_artistov":
        $sql = $spisok_artistov;
        $vvod = "spisok_artistov";
        if ($names)
        {
          $zapros = "SELECT * FROM `spisok_artistov` WHERE `first_name` LIKE ('%".$names."%') or `last_name` LIKE ('%".$names."%')";
        }
        break;
    case "spisok_cirk_ploshadok":
        $sql = $spisok_cirk_ploshadok;
        $vvod = "spisok_cirk_ploshadok";
        break;
}

if ($sql) 
{
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if ($zapros)
    {
        $result2 = mysqli_query($link, $zapros);
        $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    }
}
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Цирковая база данных</title>
  </head>
  <body>
    <script src="https://kit.fontawesome.com/e37c9c6522.js" crossorigin="anonymous"></script>
    <div class="wrapper">
      <div class="head-border">
        <div class="container">
          <div class="head">
            <div class="head__right">
              <a href="#">ДОСТАВКА И ОПЛАТА</a>
              <a href="#">КОНТАКТЫ</a>
            </div>
            <div class="head__left">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle button-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="far fa-user"></i>  Личный кабинет
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Регистрация</a></li>
                  <li><a class="dropdown-item" href="#">Авторизация</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="head-links">
        <div class="container">
          <div class="head-link row mt-4">
            <div class="col-12 col-xs-12 col-lg-2">
              <a href="#"><img src="image/image/logo3.png" alt=""></a>
            </div>
            <div class="col-12 xol-xs-12 col-md-7  col-lg-5">
              <form class="d-flex">
                <input class="form-control rounded-0" type="search" placeholder="Поиск товара" aria-label="Search"><div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle bg-light text-dark rounded-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Везде
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Везде</a></li>
                    <li><a class="dropdown-item" href="#">Воздушный реквизит</a></li>
                    <li><a class="dropdown-item" href="#">Гимнастика</a></li>
                    <li><a class="dropdown-item" href="#">Жонглирование</a></li>
                    <li><a class="dropdown-item" href="#">Реквизит для шоу</a></li>
                    <li><a class="dropdown-item" href="#">Товары для развлечения</a></li>
                    <li><a class="dropdown-item" href="#">Фитнес</a></li>
                    <li><a class="dropdown-item" href="#">Цирковое искусство</a></li>
                  </ul>
                </div>
                <button class="btn btn-outline-success rounded-0" type="submit"><i class="fas fa-search"></i></button>
              </form>
            </div>
            <div class="col-12 col-xs-8 col-lg-2">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                063 240 25 39
              </a>
              <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item text-big" href="#">c 10:00 до 19:30</a></li>
              </ul>
            </div>
            <div class="btn-group col-12 col-xs-4 col-md-4 col-lg-2">
                <button class="btn btn-secondary dropdown-toggle bg-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-shopping-cart"></i> 0 Товаров <br>
                  на 0грн.
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">В корзине пусто</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar">
        <div class="container">
          <div class="nav-bar d-flex">
            <div class=" collll">
              <nav class="navbar navbar-expand-xs navbar-light bg-danger rounded-3">
                <div class="container-fluid ">
                  <a class="navbar-brand text-light" href="#">КАТЕГОРИИ</a>
                  <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          ЖОНГЛИРОВАНИЕ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </li>
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ВОЗДУШНЫЙ РЕКВИЗИТ
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </li>
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      РЕКВИЗИТ ДЛЯ ШОУ
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    ЦИРКОВОЕ ИСКУССТВО
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                    </ul>
                  </div>
                </div>
              </nav>
            </div>
            <div class="margin-rightd d-flex">
              <div class="dropdown mx-3">
                <button class="btn btn-secondary dropdown-toggle bg-light text-dark border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  ГИМНАСТИКА
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Действие</a></li>
                  <li><a class="dropdown-item" href="#">Другое действие</a></li>
                  <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle bg-light text-dark border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  ФИТНЕС
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Действие</a></li>
                  <li><a class="dropdown-item" href="#">Другое действие</a></li>
                  <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                </ul>
              </div>
              <div class="dropdown mx-3">
                <button class="btn btn-secondary dropdown-toggle bg-light text-dark border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  ТОВАРЫ ДЛЯ РАЗВЛЕЧЕНИЯ
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Действие</a></li>
                  <li><a class="dropdown-item" href="#">Другое действие</a></li>
                  <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="kroshki my-3">
        <div class="container">
          <div class="kroshkiDiv">
            <a href="#">Цифровой магазин</a> / 
            <a href="#">Жонглирование</a> /
            <a href="#">Мячи</a> /
            <a href="#">Бинбеги</a> /
            Мяч 6 Panel Pro Star UV
          </div>
        </div>
      </div>
      <div class="container">
      <h2>База данных</h2>
        <form action="#" method="post">
            <label for="select" class="form-label">Таблица</label>
            <select class="form-select w-100" id="select" name="table" aria-label="Default select example">
                <option value="exit_log" selected>exit_log</option>
                <option value="kategorii">kategorii</option>
                <option value="sale_ticket">sale_ticket</option>
                <option value="spisok_artistov">spisok_artistov</option>
                <option value="spisok_cirk_ploshadok">spisok_cirk_ploshadok</option>
            </select>
            <label for="names" class="form-label">Имя артиста</label>
            <input type="text" class="form-control" id="names" name="names">
            <label for="price" class="form-label">Категория</label>
            <input type="text" class="form-control" id="kategiria" name="kategiria">
            <br>
            <button type="submit" class="btn btn-primary"><u>Результат</u></button>
        </form>
      </div>
      <div class="container">
        <?php
        echo $vvod;
        ?>
        <br>
        <?php
        echo $names;
        ?>
          <?php if (($vvod == "exit_log") && is_array($rows) || is_object($rows))
          {
              ?>
              <table class="table">
              <thead>
              <th scope="col">#</th>
              <th scope="col">datas</th>
              </thead>
              <tbody>
              <?
              foreach ($rows as $row) {
                  echo '<tr>';
                  echo '<td>' . $row['id'] . '</td>';
                  echo '<td>' . $row['datas'] . '</td>';
                  echo '<tr>';                
              }
              ?>
              </tbody>
              </table>
              <?
          }
              ?>

            <?php if (($vvod == "kategorii") && is_array($rows) || is_object($rows))
          {
              ?>
              <table class="table">
              <thead>
              <th scope="col">#</th>
              <th scope="col">kategoria</th>
              </thead>
              <tbody>
              <?
              foreach ($rows as $row) {
                  echo '<tr>';
                  echo '<td>' . $row['id'] . '</td>';
                  echo '<td>' . $row['kategoria'] . '</td>';
                  echo '<tr>';                
              }
              ?>
              </tbody>
              </table>
              <?
          }
              ?>

                <?php if (($vvod == "kategorii") && is_array($rows2) && $kategoria || is_object($rows2))
              {
                  ?>
                  <table class="table">
                  <thead>
                  <th scope="col">#</th>
                  <th scope="col">kategoria</th>
                  </thead>
                  <tbody>
                  <?
                  foreach ($rows2 as $row2) {
                      echo '<tr>';
                      echo '<td>' . $row2['id'] . '</td>';
                      echo '<td>' . $row2['kategoria'] . '</td>';

                      echo '<tr>';                
                  }
                  ?>
                  </tbody>
                  </table>
                  <?
              }
                  ?>
              
              <?php if (($vvod == "sale_ticket") && is_array($rows) || is_object($rows))
          {
              ?>
              <table class="table">
              <thead>
              <th scope="col">#</th>
              <th scope="col">id_ploshadki</th>
              <th scope="col">datas</th>
              <th scope="col">prodannie</th>
              <th scope="col">kas_sbor</th>
              </thead>
              <tbody>
              <?
              foreach ($rows as $row) {
                  echo '<tr>';
                  echo '<td>' . $row['id'] . '</td>';
                  echo '<td>' . $row['id_ploshadki'] . '</td>';
                  echo '<td>' . $row['datas'] . '</td>';
                  echo '<td>' . $row['prodannie'] . '</td>';
                  echo '<td>' . $row['kas_sbor'] . '</td>';
                  echo '<tr>';                
              }
              ?>
              </tbody>
              </table>
              <?
          }
              ?>
                  <?php if (($vvod == "spisok_artistov") && is_array($rows2) && $names || is_object($rows2))
              {
                  ?>
                  <table class="table">
                  <thead>
                  <th scope="col">#</th>
                  <th scope="col">first_name</th>
                  <th scope="col">last_name</th>
                  <th scope="col">kategoria_id</th>
                  <th scope="col">biografia</th>
                  <th scope="col">price</th>
                  <th scope="col">mesto_raboti_id</th>
                  </thead>
                  <tbody>
                  <?
                  foreach ($rows2 as $row2) {
                      echo '<tr>';
                      echo '<td>' . $row2['id'] . '</td>';
                      echo '<td>' . $row2['first_name'] . '</td>';
                      echo '<td>' . $row2['last_name'] . '</td>';
                      echo '<td>' . $row2['kategoria_id'] . '</td>';
                      echo '<td>' . $row2['biografia'] . '</td>';
                      echo '<td>' . $row2['price'] . '</td>';
                      echo '<td>' . $row2['mesto_raboti_id'] . '</td>';
                      echo '<tr>';                
                  }
                  ?>
                  </tbody>
                  </table>
                  <?
              }
                  ?>
            <?php if (($vvod == "spisok_artistov") && is_array($rows) || is_object($rows))
          {
              ?>
              <table class="table">
              <thead>
              <th scope="col">#</th>
              <th scope="col">first_name</th>
              <th scope="col">last_name</th>
              <th scope="col">kategoria_id</th>
              <th scope="col">biografia</th>
              <th scope="col">price</th>
              <th scope="col">mesto_raboti_id</th>
              </thead>
              <tbody>
              <?
              foreach ($rows as $row) {
                  echo '<tr>';
                  echo '<td>' . $row['id'] . '</td>';
                  echo '<td>' . $row['first_name'] . '</td>';
                  echo '<td>' . $row['last_name'] . '</td>';
                  echo '<td>' . $row['kategoria_id'] . '</td>';
                  echo '<td>' . $row['biografia'] . '</td>';
                  echo '<td>' . $row['price'] . '</td>';
                  echo '<td>' . $row['mesto_raboti_id'] . '</td>';
                  echo '<tr>';                
              }
              ?>
              </tbody>
              </table>
              <?
          }
              ?>

            <?php if (($vvod == "spisok_cirk_ploshadok") && is_array($rows) || is_object($rows))
          {
              ?>
              <table class="table">
              <thead>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">adres</th>
              </thead>
              <tbody>
              <?
              foreach ($rows as $row) {
                  echo '<tr>';
                  echo '<td>' . $row['id'] . '</td>';
                  echo '<td>' . $row['name'] . '</td>';
                  echo '<td>' . $row['adres'] . '</td>';
                  echo '<tr>';                
              }
              ?>
              </tbody>
              </table>
              <?
          }
              ?>
      </div>

    <footer class="footer mt-5">
        <div class="container">
          <div class="top row py-4">
            <div class="col-12 col-xs-3 col-md-3">
              <h5>ПОДПИСАТЬСЯ НА РАССЫЛКУ</h5>
            </div>
            <div class="col-12 col-xs-6 col-md-6">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Введите ваш адрес электронной почты" aria-label="Search">
              </form>
            </div>
            <div class="col-12 col-xs-3 col-md-3">
              <button type="button" class="btn btn-primary">Подписаться</button>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-xs-3 col-md-3">
              <a href="#"> Гарантии и возврат</a> <br>
              <a href="#"> Под заказ</a><br>
              <a href="#"> О нас</a><br>
              <a href="#">Доставка и оплата></a> <br>
              <a href="#" id=""> Карта фильтров</a><br><br>
              <a href="#">Карта сайта</a> 
            </div>
            <div class="col-12 col-xs-6 col-md-6">
              <a href="#">Связаться с нами</a>
            </div>
            <div class="col-12 col-xs-3 col-md-3">
              НАШИ КОНТАКТЫ <br> <br>
              063 240 25 39 <br>
              admin@showshop.com.ua <br>
             Цирковой ShowShop © 2021 <br>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>