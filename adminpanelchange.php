<?php 
session_start();
if(empty($_SESSION['login']) || $_SESSION['login'] == ''){
    echo '<script type="text/javascript"> window.location = "login.php" </script>';
    die();
}

 ?>

<html>
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Kursach_project</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/admin.css">

  <link href="https://fonts.googleapis.com/css?family=Merriweather:300i&display=swap" rel="stylesheet">

  


  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"> </script>





</head>

<body>

  <header>

    <nav class="navbar navbar-expand-lg">


      <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="navbar-nav mx-auto">

          <li class="nav-item active">
            <a href="adminpanelchange.php" class="nav-link text-capitalize " style="justify-content: center; align-items: center;">Добавить/Изменить записи</a>
          </li>


          <li class="nav-item">
            <a href="adminpanelrecipesview.php" class="nav-link text-capitalize" style="justify-content: center; align-items: center;">Просмотр/Удаление рецептов</a>
          </li>

          <li class="nav-item">
            <a href="adminpanelcategoriesview.php" class="nav-link text-capitalize " style="justify-content: center; align-items: center;">Просмотр/Удаление категорий</a>
          </li>
          <li class="nav-item">
            <a href="adminpanelrecomendationsview.php" class="nav-link text-capitalize" style="justify-content: center; align-items: center;">Просмотр/Удаление рекомендаций</a>
          </li>


          <li class="nav-item">
            <a href="logout.php" class="nav-link text-capitalize" style="justify-content: flex-end;">Выйти</a>
          </li>



        </div>


      </ul>
    </div>
  </nav>
</header>


<section id="about" class="pl-5 pt-5 pb-5  background">



  <div class=".container-fluid pt-2 mr-5 ml-5" style="border: solid 2px #242424">
    <h2 style="text-align: center;" class="pb-2 pt-2">Операции по добавлению информации в базу данных</h2>

    <div class="row">
      <div class="col-sm ml-3 mr-3 mt-2" style="border: solid 1px #242424" >

        <section id='main'>
          <div class="hidden">
            <form id="auth" class="popup_fast py-2 mt-2 pl-4  " style="right:38%;" method="POST" enctype="multipart/form-data">
              <h5>Новый рецепт</h5>

              <h6>Выберите фото</h6>
              <input type="file" name="recipeimage" class="form-control" style="width:60%" placeholder="Ваш логин">
              <p></p>
              <h6>Информация о рецепте</h6>
              <input type="text"  name="strMeal" id="strMeal" size=40 placeholder="Название рецепта">
              <p></p>
              <input type="text"  name="strMealCategory" id="strMealCategory" size=40 placeholder="Категория блюда">
              <p></p>
              <input type="text"  name="strArea" id="strArea" size=40 placeholder="Страна происхождения">
              <p></p>
              <input type="text"  name="strCookTime" id="strCookTime" size=40 placeholder="Время приготовления">
              <p></p>
              <textarea name="strInstructions" id="strInstructions" cols=38 rows=4 placeholder="Шаги приготовления"></textarea> 
              <p></p>
              <textarea name="strTags" cols=38 rows=3 oninput="this.value = this.value.replace(/[^А-Яа-яЁё ,]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Тэги через запятую"></textarea> 
              <p></p>
              <textarea name="strIngredients" id="strIngredients" cols=38 rows=3 placeholder="Ингредиенты через запятую"></textarea> 
              <p></p>
              <textarea name="strMeasures" id="strMeasures" cols=38 rows=3   placeholder="Кол-во ингредиентов через запятую"></textarea> 
              <p></p>
              <input type="text" name="Calories" id="Calories"  maxlength="4" size=40 placeholder="Калорий на порцию">
              <p></p>
              <input type="text" name="Protein" id="Protein"  maxlength="4" size=40 placeholder="Белки (гр)">
              <p></p>
              <input type="text" name="Fats"  id="Fats"  maxlength="4" size=40 placeholder="Жиры (гр)">
              <p></p>
              <input type="text" name="Carbs" id="Carbs"  maxlength="4"  size=40 placeholder="Углеводы (гр)">
              <p></p>

              

              <button type="submit" name="action" value="addrecipe" class="btn" style="border: solid 1px;">Добавить рецепт</button>


              <p></p>
              <input type="text" name="mealID" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" size=19 placeholder="ID записи">
              <p></p>
              <button type="submit" name="action" value="changerecipe" class="btn" style="border: solid 1px;">Изменить рецепт</button>

              
            </form>
          </div>
        </section>
      </div>

      <div class="col-sm mr-3 ml-3 mt-2" style="border: solid 1px #242424">
        <section id='main'>
          <div class="hidden">
            <form id="auth" class="popup_fast py-2 pl-4 " style="right:38%;" method="POST" enctype="multipart/form-data">
              <h5>Новая категория</h5>
              <h6>Выберите фото</h6>
              <input type="file" name="categoryimage" class="form-control" style="width:65%" placeholder="Ваш логин">
              <p></p>
              <h6>Информация о категории</h6>
              <input type="text" name="strCategory" id="strCategory" size=40 placeholder="Название категории">
              <p></p>
              <textarea name="strCategoryDescription" id="strCategoryDescription" cols=38 rows=5 placeholder="Описание категории"></textarea> 
              <p></p>

              <button type="submit" name="action" value="addcategory" class="btn" style="border: solid 1px;">Добавить категорию</button>
              <p></p>
              <input type="text" name="categoryID" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" size=23   placeholder="ID записи">
              <p></p>
              <button type="submit" name="action" value="changecategory" class="btn" style="border: solid 1px;">Изменить категорию</button>
            </form>
          </div>
        </section>


      </div>

      <div class="col-sm mr-3 ml-3 mt-2" style="border: solid 1px #242424">
        <section id='main'>
          <div class="hidden">
            <form id="auth" class="popup_fast py-2 pl-4 " style="right:38%;" method="POST" enctype="multipart/form-data">
              <h5>Новая рекомендация</h5>
              <p></p>

              <h6>Цель рекомендации</h6>
                <input type="radio" onMouseDown="this.isChecked=this.checked;" 
                onClick="this.checked=!this.isChecked;" name="goal" value="one" /> Поддержание веса<br />
                <input type="radio" onMouseDown="this.isChecked=this.checked;" 
                onClick="this.checked=!this.isChecked;" name="goal" value="two" /> Набор веса<br />
                <input type="radio" onMouseDown="this.isChecked=this.checked;" 
                onClick="this.checked=!this.isChecked;" name="goal" value="three" /> Похудение<br />
                <p></p>
                <h6>Для людей с</h6>
                <input type="radio" onMouseDown="this.isChecked=this.checked;" 
                onClick="this.checked=!this.isChecked;" name="weight" value="one" /> Весом в пределах нормы<br />
                <input type="radio" onMouseDown="this.isChecked=this.checked;" 
                onClick="this.checked=!this.isChecked;" name="weight" value="two" /> Недостаточным весом<br />
                <input type="radio" onMouseDown="this.isChecked=this.checked;" 
                onClick="this.checked=!this.isChecked;" name="weight" value="three" /> Избыточным весом<br />

                <p></p>

              
              <textarea name="strRecomendationDescription" id="strRecomendationDescription" maxlength="177" cols=38 rows=5 placeholder="Текст рекомендации"></textarea> 
              <p></p>

              <button type="submit" name="action" value="addrecomendation" class="btn" style="border: solid 1px;">Добавить рекомендацию</button>
              <p></p>
              
            </form>
          </div>
        </section>


      </div>


    </div>

    <section id='main' style="border: solid 1px #242424 " class="mt-1 mb-1">
      <div class="hidden">
        <form id="auth" class="popup_fast py-2 pl-4 pr-4 " style="right:38%;" method="POST" enctype="multipart/form-data">
          <h5 style="text-align: center;">Повысить версию БД и форсировать обновление БД клиентских приложений</h5>

          <button type="submit" name="action" value="updatedbversion" class="btn" style="border: solid 1px; width: 100%">Выполнить</button>
        </form>
      </div>
    </section>
  </section>


 <!-- Новая рекомендация -->

 <?php 


  if (isset($_POST['goal']) and isset($_POST['weight']) and isset($_POST['strRecomendationDescription']) and $_REQUEST['action'] =='addrecomendation' )
  {

    require 'api/db_connect.php';

    
    $rectext = $_POST['strRecomendationDescription'];


    switch($_POST['goal'] )
    {
      case 'one':
      $goal = 'Поддержание веса';
      break;
      case 'two':
      $goal = 'Набор веса';
      break;
      case 'three':
      $goal = 'Похудение';
      break;
    }

    switch($_POST['weight'] )
    {
      case 'one':
      $status = 'Вес в пределах нормы';
      break;
      case 'two':
      $status = 'Недостаточный вес';
      break;
      case 'three':
      $status = 'Избыточный вес';
      break;
      
    }

    

    $queryya = "INSERT INTO recomendations (goal,status,rectext) VALUES ('$goal','$status','$rectext')";
    $result = mysqli_query($bd, $queryya) or die ("Ошибка".mysqli_error($bd));  
  }
  ?>

  <!-- Новая категория -->

  <?php 
  if (isset($_FILES['categoryimage']) and isset($_POST['strCategory']) and isset($_POST['strCategoryDescription']) and $_REQUEST['action'] =='addcategory' )
  {


    require 'api/db_connect.php';

    
    $strcategory = $_POST['strCategory'];
    $strcategorydescription = $_POST['strCategoryDescription'];
    $error = arraY();
    $file_name = $_FILES['categoryimage']['name'];
    $file_size = $_FILES['categoryimage']['size'];
    $file_tmp = $_FILES['categoryimage']['tmp_name'];
    $file_type = $_FILES['categoryimage']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['categoryimage']['name'])));


    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions) == false)
    {
      $error[] = "Изображение должно иметь расширения jpeg,jpg,png";
      echo '<div id="dialog" title="Новая категория">Изображение должно иметь расширения jpeg,jpg,png</div>';
    }

    if(empty($error)==true)
    {

		move_uploaded_file($file_tmp, "source/images/" . $file_name);

      
      $path = "source/images/" . $file_name;

      $query = "INSERT INTO categories (strCategory,strCategoryThumb,strCategoryDescription) VALUES ('$strcategory','$path','$strcategorydescription')";
      $result =mysqli_query($bd, $query) or die ("Ошибка".mysqli_error($bd)); 

    }

    echo '<div id="dialog" title="Новая категория">Новая категория успешно добавлена в БД</div>';
    
    
  }
  ?>

  <!-- Изменение существующей категории -->

  <?php 
  if (isset($_FILES['categoryimage']) and isset($_POST['strCategory']) and isset($_POST['strCategoryDescription']) and isset($_POST['categoryID']) and $_REQUEST['action'] =='changecategory')
  {


    require 'api/db_connect.php';

    
    $strcategory = $_POST['strCategory'];
    $strcategorydescription = $_POST['strCategoryDescription'];
    $error = arraY();
    $file_name = $_FILES['categoryimage']['name'];
    $file_size = $_FILES['categoryimage']['size'];
    $file_tmp = $_FILES['categoryimage']['tmp_name'];
    $file_type = $_FILES['categoryimage']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['categoryimage']['name'])));


    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions) == false)
    {
      $error[] = "Изображение должно иметь расширения jpeg,jpg,png";
      echo '<div id="dialog" title="Изменение категории">Изображение должно иметь расширения jpeg,jpg,png</div>';
    }

    if(empty($error)==true)
    {
      move_uploaded_file($file_tmp, "source/images/" . $file_name);
      $path = "source/images/" . $file_name;
      $categoryid = $_POST['categoryID'];

      $queryy = "UPDATE categories set strCategory = '$strcategory',strCategoryThumb = '$path',strCategoryDescription =  '$strcategorydescription' WHERE idCategory = '$categoryid'";
      $result =mysqli_query($bd, $queryy) or die ("Ошибка".mysqli_error($bd)); 
      
    }
    
    echo '<div id="dialog" title="Изменение категории">Категория успешно изменена</div>';

    
  }
 
  ?>





  <!-- Новый рецепт -->

  <?php 
  if (isset($_FILES['recipeimage']) and isset($_POST['strMeal']) and isset($_POST['strMealCategory']) and isset($_POST['strArea']) and isset($_POST['strCookTime']) and isset($_POST['strInstructions']) and isset($_POST['strIngredients']) and isset($_POST['strMeasures']) and isset($_POST['Calories']) and isset($_POST['Carbs']) and isset($_POST['Fats']) and isset($_POST['Protein']) and isset($_POST['strTags']) and $_REQUEST['action'] =='addrecipe')
  {

    require 'api/db_connect.php';
    
    $strmeal = $_POST['strMeal'];
    $strmealcategory = $_POST['strMealCategory'];
    $strarea = $_POST['strArea'];
    $strinstructions = $_POST['strInstructions'];
    $strtags = $_POST['strTags'];
    $stringredients = $_POST['strIngredients'];
    $strmeasures = $_POST['strMeasures'];
    $strmealinfo = $_POST['Calories'].','.$_POST['Protein'].','.$_POST['Fats'].','.$_POST['Carbs'];
    $strcookTime = $_POST['strCookTime'];
    $error = arraY();
    $file_name = $_FILES['recipeimage']['name'];
    $file_size = $_FILES['recipeimage']['size'];
    $file_tmp = $_FILES['recipeimage']['tmp_name'];
    $file_type = $_FILES['recipeimage']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['recipeimage']['name'])));

    

    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions) == false)
    {
      $error[] = "Изображение должно иметь расширения jpeg,jpg,png";
      echo '<div id="dialog" title="Новый рецепт">Изображение должно иметь расширения jpeg,jpg,png</div>';
    }

    if(empty($error)==true)
    {




      move_uploaded_file($file_tmp, "source/images/" . $file_name);

      
      //$path = "http://10.0.2.2:8080/source/images/" . $file_name;
      $path = "source/images/" . $file_name;
      $queryyy = "INSERT INTO meals (strMeal,strCategory,strArea,strInstructions,strMealThumb,strTags,strIngredients,strMeasures,strMealInfo,strCookTime) VALUES ('$strmeal','$strmealcategory','$strarea','$strinstructions','$path','$strtags','$stringredients','$strmeasures','$strmealinfo','$strcookTime')";
      $result =mysqli_query($bd, $queryyy) or die ("Ошибка".mysqli_error($bd)); 
    }

    echo '<div id="dialog" title="Новый рецепт">Новый рецепт успешно добавлен в БД</div>';
    }
 
  ?>

  <!-- Изменение рецепта -->

  <?php 
  if (isset($_FILES['recipeimage']) and isset($_POST['strMeal']) and isset($_POST['strMealCategory']) and isset($_POST['strArea']) and isset($_POST['strCookTime']) and isset($_POST['strInstructions']) and isset($_POST['strIngredients']) and isset($_POST['strMeasures']) and isset($_POST['Calories']) and isset($_POST['Carbs']) and isset($_POST['Fats']) and isset($_POST['Protein']) and isset($_POST['strTags']) and isset($_POST['mealID']) and $_REQUEST['action'] =='changerecipe')
  {

    require 'api/db_connect.php';
    
    $strmeal = $_POST['strMeal'];
    $strmealcategory = $_POST['strMealCategory'];
    $strarea = $_POST['strArea'];
    $strinstructions = $_POST['strInstructions'];
    $strtags = $_POST['strTags'];
    $stringredients = $_POST['strIngredients'];
    $strmeasures = $_POST['strMeasures'];
    $strmealinfo = $_POST['Calories'].','.$_POST['Protein'].','.$_POST['Fats'].','.$_POST['Carbs'];
    $strcookTime = $_POST['strCookTime'];
    $error = arraY();
    $file_name = $_FILES['recipeimage']['name'];
    $file_size = $_FILES['recipeimage']['size'];
    $file_tmp = $_FILES['recipeimage']['tmp_name'];
    $file_type = $_FILES['recipeimage']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['recipeimage']['name'])));

    

    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions) == false)
    {
      $error[] = "Изображение должно иметь расширения jpeg,jpg,png";
      echo '<div id="dialog" title="Изменение рецепта">Изображение должно иметь расширения jpeg,jpg,png</div>';
    }

    if(empty($error)==true)
    {
      move_uploaded_file($file_tmp, "source/images/" . $file_name);
      //$path = "http://10.0.2.2:8080/source/images/" . $file_name;
      $path = "source/images/" . $file_name;
      $mealid = $_POST['mealID'];

      $queryyy = "UPDATE meals set strMeal = '$strmeal' ,strCategory = '$strmealcategory',strArea = '$strarea',strInstructions = '$strinstructions',strMealThumb = '$path',strTags = 'strtags', strIngredients = '$stringredients',strMeasures = '$strmeasures',strMealInfo = '$strmealinfo',strCookTime = '$strcookTime' WHERE idMeal = '$mealid'";
      
      $result =mysqli_query($bd, $queryyy) or die ("Ошибка".mysqli_error($bd)); 
    }

    echo '<div id="dialog" title="Изменение рецепта">Рецепт успешно изменён</div>';

    
  }
  ?>

  <!-- Повышение версии БД -->

  <?php 
  if ($_REQUEST['action'] =='updatedbversion')
  {


    require 'api/db_connect.php';

    
    

    $queryyyy = "INSERT INTO versions (date) VALUES (CURDATE())";

    $result = mysqli_query($bd, $queryyyy) or die ("Ошибка".mysqli_error($bd)); 

    echo '<div id="dialog" title="Повышение версии">Версия БД успешно повышена</div>';

    
    
  }
  ?>



<script>

$(document).on('keypress', '#strMeal, #strMealCategory, #strArea, #strCategory, #strCategoryDescription, #strRecomendationDescription', function (event) {
    var regex = new RegExp("^[А-Яа-яЁё ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$(document).on('keypress', '#strCookTime, #strIngredients', function (event) {
    var regex = new RegExp("^[А-Яа-яЁё 1-9 ,]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$(document).on('keypress', '#strInstructions,#strMeasures', function (event) {
    var regex = new RegExp("^[А-Яа-яЁё 0-9 ,/]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$(document).on('keypress', '#Fats,#Carbs,#Calories,#Protein', function (event) {
    var regex = new RegExp("^[0-9 .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
</script>





</body>
</html>



