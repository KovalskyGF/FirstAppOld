<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title>СтройИнвест - Главная</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap grid CSS -->
    <link href="css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick Slider -->
    <link href="slick/slick.css" rel="stylesheet">
    <link href="slick/slick-theme.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="slick/slick.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
        $(document).on('ready', function () {
          $(".direction-blocks").slick({
            arrow: false,
            dots: true,
            slidesToShow: 4,
            slidesToScroll: 1
          });
        });
    </script>
    <script type="text/javascript">
      $(document).ready(function(){ 
        $('.slickslider').slick({
          dots: true,
          infinite: true,
          autoplaySpeed: 2500,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
        });
      })
    </script>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/contacts.css" rel="stylesheet">
    <!-- Fonts Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">    
  </head>
  <body>
  	 <div class="container">
         <div class="top-nav">
  	          <div class="row justify-content-between align-items-center">
  	 	           <div class="col-md-auto">
  	 	                <div class="logo">
  	                       <img src="img/logo.png" alt="Что-то">
  	                  </div>
  	             </div><!-- /.col-md-->
  	             <div class="col-md-auto">
  	                 <?php
                     require 'title.php';
  	                 ?>
  	             </div><!-- /.col-md-->
  	             </div> <!-- /.row-->     
  	     </div><!-- /.top-nav-->
   <div class="row">
   	  <div class="col-md-4">
   		   <div class="left-sidebar">
   			    <ul class="left-sidebar_menu">
   			        <?php
                    $mysqli = new mysqli("localhost", "root", "", "kursach");
                    /* проверка соединения */
                    if ($mysqli->connect_errno) {
                      printf("Соединение не удалось: %s\n", $mysqli->connect_error);
                      exit();
                      }
                      $idf='';
                      $query = "SELECT id, category FROM services";
                      if ($result = $mysqli->query($query)) {
                      /* извлечение ассоциативного массива */
                      while ($row = $result->fetch_assoc()) 
                      {
                        echo ("<li><a href=index.php?id=$row[id]>$row[category]</a></li>");
                        
                      }
                      $idf=$_GET['id'];

                    /* удаление выборки */
                    $result->free();
                    }
                    /* за крытие соединения */
                    $mysqli->close();
                    ?>
                </ul>
            <div class="left-sidebar_object">
                 <img src="img/objects/1.png" alt="Картинка 1">
                        <div class="left-sidebar_object-description">
                                 <h3>Жилой комплекс в г. Москва</h3>
                                 <p>190-квартирный 12-этажный жилой дом № 88 по ул. Ленина в микрорайоне Центральный</p>
                                 <a href="#"><u>Узнать подробнее »</u></a>
                        </div>
                        
                        <div class="left-sidebar_object-sort">
                        Сортировать по: <br>
                          <strong>имени</strong>(<span id="namea">от А до Я</span>/<span id="named">от Я до А</span>)
                          <br><strong>цене</strong> (<span id="pricea">возрастание</span>/<span id="priced">убывание</span>)
                        </div>
            </div>
             <div class="left-sidebar_object">
                  <img src="img/objects/2.png" alt="Картинка 2">
                        <div class="left-sidebar_object-description">
                             <h3>Жилой комплекс в г. Москва</h3>
                             <p>190-квартирный 12-этажный жилой дом № 88 по ул. Ленина в микрорайоне Центральный</p>
                             <a href="#">Узнать подробнее »</a>
                        </div>
             </div>
          </div> <!-- ./left-sidebar -->
      </div><!-- ./col-md-4 -->
   	<div class="col-md-8">
       <div class="content">
        <div id="left-sidebar_object-fon">
        </div>
        <div id="left-sidebar_object-load">
        </div>
        <div class="slickslider">
           <div><img src="img/slider/slide1.png"/></div>
           <div><img src="img/slider/slide2.png" style="margin: 0 0 25px";/></div>
           <div><img src="img/slider/slide3.png" style="margin: 0 0 25px";/></div>
        </div>
         <?php
           $mysqli = new mysqli("localhost", "root", "", "kursach");
           /* проверка соединения */
           if ($mysqli->connect_errno) {
             printf("Соединение не удалось: %s\n", $mysqli->connect_error);
             exit();
           }
          
           

           	if($idf=='0') { 
           		$query = "SELECT * FROM news WHERE 	news_id=1";
           	 }
           	else	{ 
           		$query = "SELECT * FROM article WHERE id=$idf"; } //СЛЕВА
           
           
           
           if ($result = $mysqli->query($query)) {
             /* извлечение ассоциативного массива */
             while ($row = $result->fetch_assoc()) 
             {
               printf ("<h2>%s</h2> <br>%s", $row["tittle"], $row["text"]);
               
             }
             /* удаление выборки */
             $result->free();
           }
           /* закрытие соединения */
           $mysqli->close();
         ?>

       </div><!-- ./content -->
               <div class="directions">
                 <h2>Направление деятельности</h2>
                     <div class="direction-blocks">
                          <div class="directions-block" style="background-image: url(img/directions/1.png);">
                          	<h3>Девелоперские проекты</h3>
                          </div>
                          <div class="directions-block" style="background-image: url(img/directions/3.png);">
                            <h3>Строительство</h3>
                          </div>
                          <div class="directions-block" style="background-image: url(img/directions/2.png);">
                            <h3>Продажа недвижемости</h3>
                          </div>
                          <div class="directions-block" style="background-image: url(img/directions/5.png);">
                            <h3>Инвестиционные программы</h3>
                          </div>
                          <div class="directions-block" style="background-image: url(img/directions/6.png);">
                            <h3>Финансовые инструменты</h3>
                          </div>
                     </div>
               </div>
    </div><!-- ./col-md-8 -->
   </div><!-- ./row -->
    </div><!-- /.container-->
    <footer class="footer">
      <div class="container">
       <div class="row">
        <div class="col-md-4">
         <div class="copy">
          <p>Copyright @ 2018</p>
          <a class="footer-policy-link" href="#">Полика конфиденциальности</a>
          <small>Использование материалов сайта, размещенных на ней статей, материалов без согласия администрации и авторов размещенных материалов не допускается.</small>
         </div><!-- ./copy -->
        </div><!-- ./col-md -->
        <div class="col-md-2">
            <ul class="footer_menu">
                <li><a href="index.php">Главная</a></li>
                <li><a href="about.php">О компании</a></li>
                <li><a href="services.php">Наши услуги</a></li></a></li>
                <li><a href="ipoteka.php">Ипотека</a></li>
                <li><a href="invest.php">Инвесторам</a></li>
                <li><a href="contacts.php">Контакты</a></li>
            </ul>



        </div>
        <div class="col-md">
          <ul class="footer_menu">
              <li><a href="1.php">Утепление фасадов</a></li>
              <li><a href="2.php">Кровельные работы</a></li>
              <li><a href="3.php">Электромонтаж</a></li>
              <li><a href="4.php">Реконструкция зданий</a></li>
              <li><a href="5.php">Демонтажные работы</a></li>
              <li><a href="6.php">Капитальный ремонт помещений</a></li>
            </ul>
        </div>
          
        <div class="col-md">
          <div class="content_contacts">
            <p class="content-contacts_phone">8 (800) 850-50-50</p>
            <p class="content-contacts_address">г. Москва, ул. Морозова, д.12, 3 этаж</p>
            <p class="content-contacts_address">г. Москва, ул. Ленина, д. 23, офис 2</p>
            <p class="content-contacts_email">invest@mail.ru</p>
          </div>
          <div class="footer-social-links">
            <ul>
              <li><a href="http://vk.com" target="_blank"><i class="icon-vk"></i></a></li>
              <li><a href="http://facebook.com" target="_blank"><i class="icon-facebook"></i></a></li>
              <li><a href="http://instagram.com" target="_blank"><i class="icon-instagram"></i></a></li>
            </ul>
          </div>
       </div><!-- .row -->
      </div><!-- .container -->
    </footer>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   </body>
</html>