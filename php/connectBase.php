<?php
//!!!!!!!!!!!!!! ДОБАВЛЕНИЕ ТАБЛИЦ
if(isset($_POST["newtable_add"])){
	$conn = new mysqli("localhost","root","","delivery_goods");

    if($conn->connect_error){
        die("1_Ошибка: " . $conn->connect_error);
    }

	 //? получаем с формы данные по name в переменные
	$create_base = $conn->real_escape_string($_POST["newtable_add"]);



	//???????????? создаёт новую таблицу
	$sql = "CREATE TABLE $create_base(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		first_name VARCHAR(30) NOT NULL,
		last_name VARCHAR(30) NOT NULL,
		email VARCHAR(70) NOT NULL UNIQUE
  ) ";
	

	//?????????????? создания сообщения в textarea (потому-что захотел) смысла нет
	if(isset($_POST["newtable_add"])){
			if($conn->query($sql)){
			echo "<form action='php/connectBase.php' method='post' class='error_box'>
			<textarea name='error_box' id='error_box' cols='30' rows='10'>База данных успешно создана.</textarea>
		</form>";
		} else {
			echo "<form action='php/connectBase.php' method='post' class='error_box'>
			<textarea name='error_box' id='error_box' cols='30' rows='10'>'. $conn->error.'</textarea>
		</form>";
		}
	}




	// header('Location: /');


	$conn->close();
}
//!!!!!!!!!!!!!! УДАЛЕНИЕ ТАБЛИЦ
else if(isset($_POST["table_del"])){

	$conn = new mysqli("localhost","root","","delivery_goods");
	if($conn->connect_error){
		die("1_Ошибка: " . $conn->connect_error);
  }

	$drop_base = $conn->real_escape_string($_POST["table_del"]);


	//? удаляе
	$sqlD = "DROP TABLE $drop_base";

		//?????????????? создания сообщения в textarea (потому-что захотел) смысла нет
		if(isset($_POST["table_del"])){
			if($conn->query($sqlD)){
				echo "<form action='php/connectBase.php' method='post' class='error_box'>
				<textarea name='error_box' id='error_box' cols='30' rows='10'>База данных успешно удалена.</textarea>
			</form>";
			} else {
				echo "<form action='php/connectBase.php' method='post' class='error_box'>
				<textarea name='error_box' id='error_box' cols='30' rows='10'>'. $conn->error.'</textarea>
			</form>";
			}
		}
	
	$conn->close();
}
//!!!!!!!!!!!!!добавление нового поля

if(isset($_POST["table_name"]) && isset($_POST["name_create_rows"]) && isset($_POST["type_create_rows"]) && isset($_POST["size_create_rows"])){

	$conn = new mysqli("localhost","root","","delivery_goods");

    if($conn->connect_error){
        die("1_Ошибка: " . $conn->connect_error);
    }

	 //? получаем с формы данные по name в переменные
	$tb_name = $conn->real_escape_string($_POST["table_name"]);
	$name_cr = $conn->real_escape_string($_POST["name_create_rows"]);
	$type_cr = $conn->real_escape_string($_POST["type_create_rows"]);
	$size_cr = $conn->real_escape_string($_POST["size_create_rows"]);

	//???????????? создаёт новую таблицу
	$sql = "ALTER TABLE `$tb_name` ADD `$name_cr` $type_cr($size_cr)";
	

	//?????????????? создания сообщения в textarea (потому-что захотел) смысла нет
	if(isset($_POST["table_name"])){
			if($conn->query($sql)){
			echo "<form action='php/connectBase.php' method='post' class='error_box'>
			<textarea name='error_box' id='error_box' cols='30' rows='10'>База данных успешно создана.</textarea>
		</form>";
		} else {
			echo "<form action='php/connectBase.php' method='post' class='error_box'>
			<textarea name='error_box' id='error_box' cols='30' rows='10'>'. $conn->error.'</textarea>
		</form>";
		}
	}


$conn->close();
}

if(isset($_POST["table_namedata"]) || isset($_POST["first_name"]) || isset($_POST["last_name"]) || isset($_POST["email"])){

	$conn = new mysqli("localhost","root","","delivery_goods");

    if($conn->connect_error){
        die("1_Ошибка: " . $conn->connect_error);
    }

	 //? получаем с формы данные по name в переменные
	$tb_name = $conn->real_escape_string($_POST["table_namedata"]);
	$f_name = $conn->real_escape_string($_POST["first_name"]);
	$l_name = $conn->real_escape_string($_POST["last_name"]);
	$email = $conn->real_escape_string($_POST["email"]);

	//???????????? создаёт новую таблицу
	$sql = "INSERT INTO `$tb_name` (`id`, `first_name`, `last_name`, `email`) VALUES (NULL, '$f_name', '$l_name', '$email') ";
	

	//?????????????? создания сообщения в textarea (потому-что захотел) смысла нет
	if(isset($_POST["table_namedata"])){
			if($conn->query($sql)){
			echo "<form action='php/connectBase.php' method='post' class='error_box'>
			<textarea name='error_box' id='error_box' cols='30' rows='10'>Пользователь добавлен.</textarea>
		</form>";
		} else {
			echo "<form action='php/connectBase.php' method='post' class='error_box'>
			<textarea name='error_box' id='error_box' cols='30' rows='10'>'. $conn->error.'</textarea>
		</form>";
		}
	}


$conn->close();
}

//!!! добавления записи в таблицу

?>
