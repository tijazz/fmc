<?php

class Dbconnect {
	private $db_name = "dufmadb";
	public $handle;
	public $stmt;
	private $db_host= "127.0.0.1";
	//private $db_host= "127.0.0.1";

	public function __construct(){
		
		$this->handle=$this->dbEngine();

	}

	public function dbEngine(){
		try{
			$this->handle=new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name,"root","");
		  $this->handle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		 
		
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		return $this->handle;
	}
	/*
	public function logout() {
		session_start();
		if(isset($_SESSION)){
			session_destroy();
			header("Location: login.php");
			exit();
		}
	  }
	*/

	//staff login funtion
	public function login($array){
		try{
		
			$stmt = $this->handle->prepare("SELECT id, fullname, email,category,unit_value,roi,unit, phone FROM member WHERE email = :field1 AND pword = :field2 ");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll();
				foreach ($var as $key => $value) {
						//give session to this staff
						session_start();
						($_SESSION['staffID'] = $value['id']);
						($_SESSION['staffname'] = $value['fullname']);
						($_SESSION['email'] = $value['email']);
						($_SESSION['category'] = $value['category']);
						($_SESSION['unit_value'] = $value['unit_value']);
						($_SESSION['roi'] = $value['roi']);
						($_SESSION['phone'] = $value['phone']);
						($_SESSION['unit'] = $value['unit']);
						($_SESSION['timestamp'] = time());
						header("Location: dashboard.php");
						
					
				}
			
			}else{
					echo "<div id='alert' style = 'text-align : center; color: red; background-color: '#fee6e4'; width: 50%; opacity: 0.7; border-radius: 5px; padding:13px 13px;'>Incorrect Username and Password</div>";
			
   	
				}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}



	
	//update user details
	public function updateProfile($table, $array, $id){
		try{
		$stmt = $this->handle->prepare("UPDATE $table SET fullname = :field1, email = :field2, phone = :field3, password = :field4, photo = :photo WHERE id = $id");
		//print_r($stmt);	
		$stmt->execute($array);
			
			if ($stmt) {
				echo "<p style='color:green'>Records Updated Successfully</p>";
				header("Location: profile.php");
			}
			else{
				echo "<p style='color:red'>Not successful</p>";
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}



	public function logout() {
			session_destroy();
		
	  }
	public function forcelogout(){
		if(time() - $_SESSION['timestamp'] > 1300) {
		    if(isset($_SESSION['admin']) || isset($_SESSION['staff']) || isset($_SESSION['client'])){
		      session_destroy();
			}
			else {
		    	$_SESSION['timestamp'] = time();
			}
		}
	}
	public function getFashion(){
		try{
			
			$stmt = $this->handle->prepare("SELECT p.*, u.*, c.* FROM posts as p, users as u, category as c WHERE p.category_id = 1");
			$stmt->execute(array());
		
			//$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				echo "No Post yet ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


		//admin getting notification
		public function notifyAdmin11($session){
			try{
				$stmt = $this->handle->prepare("SELECT a.*, b.* FROM notifications as a, staff as b  WHERE a.receiver_read = 0 AND 
				a.receiver = 1 AND a.sender = b.id AND b.id = 1 AND a.receiver = b.id ORDER BY a.id DESC ");
				$stmt->execute((array($session)));
				$row = $stmt->rowCount();
				if($row > 0){
					$var = $stmt->fetchAll();
					foreach($var as $key => $value){
						if($key < 3){
							?>
							<li>
							<a href="clientdetails.php?client=<?php echo $value['client_id'] ?> " >
							<div class="pull-left">
							<img src="<?php echo $value['passport']; ?>" class="img-circle" alt="User Image" >
							</div>
							<h4>
							<?php echo $value['surname'] ?>
							<small><li class="fa fa-clock-o"><?php echo $value['msg_date']; ?></li></small>
							</h4> 
							<p> <?php echo $value['msg']; ?></p>
							</a>
							</li>
							<?php
						}
					}
				}
				else{
					echo "<li>No unread notification</li>";
				}
			}
			catch(PdoException $e){
				echo $e->getMessage();
			}
	
		}
	
	
	

	//staff login funtion
	public function adminLogin($table_name, $array){
		try{
		
			$stmt = $this->handle->prepare("SELECT id, username, role FROM $table_name WHERE username = :field1 AND password = :field2 ");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row == 1){
				$var = $stmt->fetchAll();
				foreach ($var as $key => $value) {
					if($value['role'] == "Admin"){
						//give session to this staff
						session_start();
						($_SESSION['id'] = $value['id']);
						($_SESSION['username'] = $value['username']);
						($_SESSION['timestamp'] = time());
						header("Location: admin/dashboard.php");
					}
					/*
					elseif ($value['role'] == " ") {
						($_SESSION['username'] = $value['username']);
						echo 	$_SESSION['username'];
						/*
						session_start();
						($_SESSION['admin'] = $value['id']);
						($_SESSION['username'] = $value['username']);
						($_SESSION['timestamp'] = time());
						header("Location: index.php");
						*/
					//} 
					
					elseif ($value['role'] == ""){
						session_start();
						($_SESSION['id'] = $value['id']);
						($_SESSION['username'] = $value['username']);
						($_SESSION['timestamp'] = time());
						
						header("Location: index.php");
					}

					else{
						session_start();
						($_SESSION['username'] = $value['username']);
						($_SESSION['timestamp'] = time());
						
						header("Location: Author/index.php");
					}
				}
			
			} else {
				echo "Incorrect password!";
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

	//function to add users
	public function addUsers($table, $array){
		try{
			$stmt = $this->handle->prepare("INSERT INTO $table (username, email, password) VALUES (:field1, :field2, :field3)");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully saved </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved </b>";
			}
		}
		catch(PdoException  $e){
			echo $e->getMessage();
		}
	}

	public function addContacts($table, $array){
		try{
			$stmt = $this->handle->prepare("INSERT INTO $table (firstname, lastname, email, telephone, message) VALUES (:field1, :field2, :field3, :field4, :field5)");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully saved </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved </b>";
			}
		}
		catch(PdoException  $e){
			echo $e->getMessage();
		}
	}


	public function retrieve($table_name) {
        try{
            $this->stmt = $this->handle->prepare("SELECT * FROM $table_name ");
			$this->stmt->execute();
            $row = $this->stmt->rowCount();
            $var = $this->stmt->fetchAll();
            if($row > 0){
                return $var;
            }
            else{
                echo "Record not done";
            }
        }
        catch(PdoException $e){
            echo $e->getMessage();
        }
	}
	
	//update user details
	public function updateUsers($table, $array){
		try{
		$stmt = $this->handle->prepare("UPDATE $table SET username = :field1, email = :field2, password = :field3, role = :field4 WHERE id = :id");
		print_r($stmt);	
		$stmt->execute($array);
			
			if ($stmt) {
				echo "<p style='color:green'>Records Updated Successfully</p>";
				header("Location: viewUsers.php");
			}
			else{
				echo "<p style='color:red'>Not successful</p>";
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


	//get a single user
	public function getSingleUser($table, $array){
		try{
			$stmt = $this->handle->prepare("SELECT * FROM $table WHERE id = :id LIMIT 1");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch();
				return $var;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

	//get URL parameters
	public function getURL($url){
		if(isset($_GET[$url])){
			$val = $_GET[$url];
			return $val;
		}
	}


	public function updateprof($array){
		try{
			$stmt = $this->handle->prepare("UPDATE users SET username = :field1, email = :field2, password = :field3 WHERE id = :id");
			//$stmt = $this->handle->prepare("UPDATE users SET username = ?, email = ?, role = ?, password = ? WHERE id = ?");
			$stmt->execute($array);
			$row = $stmt->rowCount();
				echo $row;
				/*
			if ($stmt->execute($array)) {
				echo "<p style='color:green'>successful</p>";
				$row = $stmt->rowCount();
				echo  $row;
			}
			else{
				echo "<p style='color:red'>Not successful</p>";
			}
			*/
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}































	//function to save staff
	public function saveStaff($array){
		try{
			$stmt = $this->handle->prepare("INSERT INTO staff (reg_by, surname, othername, address, phone_number, email, password, dob, nationality, lga,state, passport, occupation, field_marker, dates,username) VALUES (:reg_by, :surname, :othername, :address, :phone_number, :email,  :password, :dob, :nationality, :lga, :state, :passport, :occupation, :field_marker, :dates, :username)");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully saved </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved </b>";
			}
		}
		catch(PdoException  $e){
			echo $e->getMessage();
		}
	}

	public function filter($var){
		stripslashes($var);
		//$this->dbh->real_escape_string($var);
	}
	
	//staff login funtion
	public function staffLogin($array){
		try{
		
			$stmt = $this->handle->prepare("SELECT id, field_marker FROM staff WHERE username = :field1 AND password = :field2 ");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll();
				foreach ($var as $key => $value) {
					if($value['field_marker'] == "o"){
						//give session to this staff
						session_start();
						($_SESSION['staff'] = $value['id']);
						($_SESSION['timestamp'] = time());
						header("Location: staff/index.php");
						
					}
					else{
					echo "You don't have priviledge to log in for now";
					}
				}
			
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}




	public function clientLogin($array){
		try{
		
			$stmt = $this->handle->prepare("SELECT id, field_marker FROM clients WHERE username = :field1 AND password = :field2 ");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll();
					foreach ($var as $key => $value) {
						if($value['field_marker'] == "o"){
							//give session to this staff
							session_start();
							($_SESSION['client'] = $value['id']);
							($_SESSION['timestamp'] = time());
							header("Location: clients/index.php");
							
						}
						else{
						echo "You don't have priviledge to log in for now";
						}
					}
				}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

	public function getByMarker($address, $stock_type, $capacity, $house_type, $name, $property_id, $property_description, 
        $property_image1, $property_image2, $property_image3,$add_property){
        try{

            $this->stmt = $this->handle->prepare("INSERT INTO stock (address, stock_type, capacity, house_type, name, property_id, 
                property_description, property_image1, property_image2, property_image3, add_property) 
                VALUES (:field1, :field2, :field3, :field4, :field5, :field6, :field7, :field8, :field9, :field10, :field11)");
            $this->stmt->execute(array(':field1'=>$address, ':field2'=>$stock_type, ':field3'=>$capacity, ':field4'=>$house_type, 
                ':field5'=>$name, ':field6'=>$property_id, ':field7'=>$property_description, ':field8'=>$property_image1, 
                ':field9'=>$property_image2, ':field10'=>$property_image3, ':field11'=>$add_property));
            $row = $this->stmt->rowCount();
            //print_r($row);
            if($row > 0){

                ?>
            	<div class="alert alert-success alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            Record Successfully Done!
	          	</div>
                <?php
            }
            else{
                ?>
            	<div class="alert alert-danger alert-dismissible">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            Record Not Done!
	          	</div>
                <?php
            }
        }
        catch(PdoException $e){
            echo $e->getMessage();
        }
    }



	
	
	//admin count notification
	public function countNotification($session){
		try{
			//$session = $_SESSION['id'];
			$stmt = $this->handle->prepare("SELECT a.*, b.* FROM notifications as a, admin as b  WHERE a.receiver_read = 0 AND  a.sender = b.id AND a.receiver = ?");
			$stmt->execute(array($session));
			$row = $stmt->rowCount();
			if($row >= 0){
				return $row;
			}
			
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}

	}

	//count registered clients
	public function countClients($session){
		try{
			//$session = $_SESSION['id'];
			$stmt = $this->handle->prepare("SELECT * FROM customer WHERE reg_by = ?");
			$stmt->execute(array($session));
			$row = $stmt->rowCount();
			if($row >= 0){
				return $row;
			}
			
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}

	}



	//count registered clients
	public function countStaff(){
		try{
			//$session = $_SESSION['id'];
			$stmt = $this->handle->prepare("SELECT * FROM staff");
			$stmt->execute(array());
			$row = $stmt->rowCount();
			if($row >= 0){
				return $row;
			}
			
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}

	}



	public function getSessionDetails($who, $choose, $session){
		try{
			//$session = $_SESSION['id'];
			$stmt = $this->handle->prepare("SELECT passport, othername, dates FROM $who WHERE id = ?" );
			$stmt->execute(array($session));
			$row = $stmt->rowCount();
			if($row > 0){
				$fetch = $stmt->fetchAll();
				foreach ($fetch as $key => $value) {
					if($choose == "name"){
						echo $value['othername'];
					}
					else if($choose == "passport"){
						echo $value['passport'];
					}
					else{
						echo $value['dates'];
					}
				}
			}
			else{
				echo "No name";
			}
			
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}

	}

	

	public function checkid($array){
		try{
			$stmt = $this->handle->prepare("SELECT * FROM customer WHERE id = :id");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch();
				return $var;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

	public function checkClientId($array){
		try{
			$stmt = $this->handle->prepare("SELECT * FROM clients WHERE clientid = :id");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				//$var = $stmt->fetch();
				return true;
			}else
			{
				return false;
				}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


	public function selectAll($table_name, $array){
		try{
			$stmt = $this->handle->prepare("SELECT * FROM $table_name WHERE id = :id");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch();
				return $var;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}
	//select cat decription
	public function selectCat($array){
		try{
			$stmt = $this->handle->prepare("SELECT cattype FROM cattable WHERE id = :id");
			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch(pdo::FETCH_ASSOC);
				return $var['cattype'];
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}



	public function listPayment($table_name, $array){
	try{
		$stmt = $this->handle->prepare("SELECT * FROM $table_name WHERE customer_id = :customer_id");
		$stmt->execute($array);
		$row = $stmt->rowCount();
		if($row > 0){
			$var = $stmt->fetch();
			foreach ($var as $key => $value) {
				$result[] = $value;
			}
			return $result;
		}
	}
	catch(PdoException $e){
		echo $e->getMessage();
	}
}



	public function updateStaffPaymentprofile($array){
		try{
			$stmt = $this->handle->prepare("UPDATE staff SET bank_name = :bank_name, account_name = :acct_name, account_num = :acct_num, payment_type = :pay_type");
			$stmt->execute($array);
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

	public function updateClientprofile($id, $array){
		try{
			$stmt = $this->handle->prepare("UPDATE clients SET phone_number = :phone_number, email = :email, address = :address, username = :username, password = :password WHERE id = $id");
			if ($stmt->execute($array)) {
				echo "<p style='color:green'>successful</p>";
			}
			else{
				echo "<p style='color:red'>Not successful</p>";
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

public function updateMakefPaymentprofile($array){
		try{
			$stmt = $this->handle->prepare("UPDATE clients SET bal = :bal,payment_date=:payment_date Where clientid=:id");
			$stmt->execute($array);
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

public function saveClient($array){
	try{
	$stmt = $this->handle->prepare("INSERT INTO customer (reg_by, surname, othername, phone_number, address, email, nationality, state, local_gov, 
				
				dates,sex) /*dob, username, password, occupation, passport, nok_surname, nok_othername,
				
				nok_address, nok_number, nok_email, nok_relationship, nok_occupation, land_address, capacity, payment_option,
				
				time_frame, type_of_building, signature, field_marker */VALUES (:reg_by, :surname, :othername, :phone_number, :address, :email, 
				
				:nationality, :state, :local_gov, :dates,:sex) ");/*:dob, :password, :occupation,  :passport, :nok_surname, :nok_othername, :username, 
				
				:nok_address, :nok_number, :nok_email, :nok_relationship, :nok_occupation, :land_address, :capacity, :payment_option,
				
				:time_frame, :type_of_building, , :signature, :field_marker */ 

			$stmt->execute(($array));
			$row = $stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


//Select client id
	public function selectClientID($array){
		try{
		
			$stmt = $this->handle->prepare("SELECT id FROM customer WHERE surname = :field1 AND othername = :field2 AND email = :field3

			 AND phone_number = :field4 ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch();
				$get = $var['id'];
				return $get;
			}
			else{
				return -1;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


public function selectProfileDetails($array){
		try{
			
			$stmt = $this->handle->prepare("SELECT * FROM clients WHERE id = :id ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch();
				return $var;
			}
			else{
				echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}



	//Select client Details
	public function selectClientProfile($array){
		try{
			
			$stmt = $this->handle->prepare("SELECT * FROM customer WHERE id = :id ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch();
				return $var;
			}
			else{
				echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}
//Select client Details
	public function selectClientBusiness($array){
		try{
			
			$stmt = $this->handle->prepare("SELECT * FROM clients WHERE clientid = :id ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				//echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}
//Select client Details
	public function selectClientPayment($array){
		try{
			
			$stmt = $this->handle->prepare("SELECT * FROM payment WHERE customer_id = :id ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				//echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}



	public function viewProfile($user, $array){
		try{
			
			$stmt = $this->handle->prepare("SELECT * FROM $user WHERE id = :id ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				//echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}




	//Mark message as READ
	public function markMessageRead($array){
		try{
			
			$stmt = $this->handle->prepare("UPDATE notifications SET receiver_read = 1 WHERE client_id = :id ");

			$stmt->execute($array);
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

	public function adminNotifiationSender($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO notifications (client_id, msg, sender, receiver, sender_read, receiver_read, msg_date) 

			VALUES (:client_id, :msg, :sender, :receiver, :sender_read, :receiver_read, :msg_date)");
			$this->stmt->execute(($array));
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}





	public function auth(){}




	//admin getting notification
	public function notifyAdmin($session){
		try{
			$stmt = $this->handle->prepare("SELECT a.*, b.* FROM notifications as a, staff as b  WHERE a.receiver_read = 0 AND 
			a.receiver = 1 AND a.sender = b.id AND b.id = 1 AND a.receiver = b.id ORDER BY a.id DESC ");
			$stmt->execute((array($session)));
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll();
				foreach($var as $key => $value){
					if($key < 3){
						?>
						<li>
						<a href="clientdetails.php?client=<?php echo $value['client_id'] ?> " >
						<div class="pull-left">
						<img src="<?php echo $value['passport']; ?>" class="img-circle" alt="User Image" >
						</div>
						<h4>
						<?php echo $value['surname'] ?>
						<small><li class="fa fa-clock-o"><?php echo $value['msg_date']; ?></li></small>
						</h4> 
						<p> <?php echo $value['msg']; ?></p>
						</a>
						</li>
						<?php
					}
				}
			}
			else{
				echo "<li>No unread notification</li>";
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}

	}



	public function getId($array, $name){
		try{
			
			$stmt = $this->handle->prepare("SELECT clientid FROM $name WHERE id = :id ");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				//echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


	public function saveClientForBusiness($array){
	try{
	$stmt = $this->handle->prepare("INSERT INTO clients (reg_by, surname, othername, phone_number, address, email, nationality, state, 				
				local_gov, dates, dob, username, password, occupation, passport, nok_surname, nok_othername,
				
				nok_address, nok_number, nok_email, nok_relationship, nok_occupation, land_address, capacity, payment_option,
				
				time_frame, type_of_building, signature, field_marker, plot, amountperplot, amountpayable, monthly_pay,bal, clientid,payment_date,sex,empadd, empname) VALUES (:reg_by, :surname, :othername, :phone_number, :address, :email, 
				
				:nationality, :state, :local_gov, :dates, :dob,:username, :password, :occupation,  :passport, :nok_surname, :nok_othername, 
				
				:nok_address, :nok_number, :nok_email, :nok_relationship, :nok_occupation, :land_address, :capacity, :payment_option,
				
				:time_frame, :type_of_building , :signature, :field_marker, :plot, :amountperplot, :amountpayable, :monthly_pay, :bal, :clientid, :payment_date, :sex, :empadd, :empname)"); 

			$stmt->execute(($array));
			$row = $stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}




	public function payment($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO payment (customer_id, staff_id, property_id, amount, date_paid) VALUES (:customer_id, :staff_id, :property_id, :amount, :date_paid)");
			$this->stmt->execute(($array));
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


	public function makepayment($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO payment (customer_id, staff_id, property_id, amount, date_paid,bankname,depositor,tellerno,datepay,amtpaid) VALUES (:customer_id, :staff_id, :property_id, :amount, :date_paid,:bankname,:depositor,:tellerno,:datepay,:amtpaid)");
			$this->stmt->execute(($array));
			$row = $this->stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


	public function paymentBalance($array){
		try{
			$stmt1 = $this->handle->prepare("SELECT amount FROM payment WHERE customer_id = :customer_id ");
			$stmt1->execute(($array));
				$var = $stmt1->fetch();
				$balance = null;
				$row = $stmt1->rowCount();
				if ($row>0) {
					foreach ($var as $key => $value) {
						$balance = $balance + $var['amount'];

					}
					return $balance;
					//return $var;
				}
			}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}


public function catInsert($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO cattable(cattype) VALUES (:catprop)");
			$this->stmt->execute(($array));
			$row = $this->stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}


}
//to insert bank name
public function bankInsert($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO bank(bank) VALUES (:bank)");
			$this->stmt->execute(($array));
			$row = $this->stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}


}
//add payment period plan
public function periodInsert($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO period(period) VALUES (:period)");
			$this->stmt->execute(($array));
			$row = $this->stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}


}
public function catSetInsert($array){
		try{
			$this->stmt = $this->handle->prepare("INSERT INTO catset(cid,description) VALUES (:cid, :description)");
			$this->stmt->execute(($array));
			$row = $this->stmt->rowCount();
			if($row > 0){
				echo "<b style = 'color : green; text-align : center'>Record successfully save </b>";
			}
			else{
				echo "<b style = 'color : red; text-align : center'>Record not saved</b>";
			}
		}

		catch(PdoException $e){
			echo $e->getMessage();
		}


}
public function selectCatAll(){
		try{
			$stmt = $this->handle->prepare("SELECT * FROM cattable");
			$stmt->execute();
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll(pdo::FETCH_ASSOC);
				return $var;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}

//Select PROPERTY TYPE
	public function selectCattableCatset(){
		try{
			
			$stmt = $this->handle->prepare("SELECT a.id,a.cattype,b.description FROM cattable as a, catset as b WHERE a.id=b.cid GROUP BY b.id");

			$stmt->execute();
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetchAll(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}
//Select PROPERTY TYPE by ID
	public function selectCattableCatsetById($array){
		try{
			
			$stmt = $this->handle->prepare("SELECT a.id,a.cattype,b.description FROM cattable as a, catset as b WHERE a.id=b.cid AND b.id=:id GROUP BY b.id");

			$stmt->execute($array);
			$row = $stmt->rowCount();
			if($row > 0){
				$var = $stmt->fetch(pdo::FETCH_ASSOC);
				return $var;
			}
			else{
				echo "No client ID ";
				return null;
			}
		}
		catch(PdoException $e){
			echo $e->getMessage();
		}
	}
public function todaysBirthDays(){
		$todaysDate = date("d-m-Y");
		$dateArray = explode("-", $todaysDate);
		$stmt = $this->handle->prepare("SELECT surname, othername, dob, email, phone_number FROM clients");
		$stmt->execute();
		$row = $stmt->rowCount();
		$count = 0;
		if($row > 0){
			$fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($fetch as $key => $value) {
				$dbDate = $value['dob'];
				$dbDateArray = explode("-", $dbDate);
				if(($dateArray[0] == $dbDateArray[0]) && ($dateArray[1] == $dbDateArray[1])){
					$count++;
					?>
						<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $value['surname']."<br/> ".$value['othername'] ?></h3>
              <h5 class="widget-user-desc">Client</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li>Date of Birth <span class="pull-right badge bg-blue"><?php echo date("M d.") ?></span></a></li>
                <li>Phone Number <span class="pull-right badge bg-blue"><?php echo $value['phone_number'] ?></span></a></li>
                <li>E mail <span class="pull-right badge bg-blue"><?php echo $value['email'] ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>


					<?php

				}
				
			}
			if($count == 0){
				?>
				<h3 class="box-title"><?php echo "No client has birthday today "?></h3>
				<?php
			}
		}
	}


	public function thisMonthBirthDays(){
		$todaysDate = array();
		$dbDateArray = array();
		$todaysDate = date("d-m-Y");
		$dateArray = explode('-', $todaysDate);
		$chooseDate = @$dateArray[1];
		
		$stmt = $this->handle->prepare("SELECT surname, othername, dob, email, phone_number FROM clients");
		$stmt->execute();
		$row = $stmt->rowCount();
		if($row > 0){
			$count = 0;
			$fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($fetch as $key => $value) {
				$dbDate = $value['dob'];
				$dbDateArray = explode("-", $dbDate);
				$choosedbDate = @$dbDateArray[1];
				if(($chooseDate == $choosedbDate)){
					$count++;
					?>
						<div class="col-md-4">
				          <!-- Widget: user widget style 1 -->
				          <div class="box box-widget widget-user-2">
				            <!-- Add the bg color to the header using any of the bg-* classes -->
				            <div class="widget-user-header bg-yellow">
				              <div class="widget-user-image">
				                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
				              </div>
				              <!-- /.widget-user-image -->
				              <h3 class="widget-user-username"><?php echo $value['surname']."<br/> ".$value['othername'] ?></h3>
				              <h5 class="widget-user-desc">Client</h5>
				            </div>
				            <div class="box-footer no-padding">
				              <ul class="nav nav-stacked">
				                <li>Date of Birth <span class="pull-right badge bg-blue"><?php echo date("$dbDateArray[0]/$dbDateArray[1]") ?></span></a></li>
				                <li>Phone Number <span class="pull-right badge bg-blue"><?php echo $value['phone_number'] ?></span></a></li>
				                <li>E mail <span class="pull-right badge bg-blue"><?php echo $value['email'] ?></span></a></li>
				              </ul>
				            </div>
				          </div>
				          <!-- /.widget-user -->
				        </div>


					<?php

				}
				
			}
			if($count == 0){
				?>
				<h3 class="box-title"><?php echo "No client has birthday this month "?></h3>
				<?php
			}
		}
	}


	public function thisMonthPayment(){
		$stmt = $this->handle->prepare("SELECT a.surname, a.othername, a.phone_number, a.amountpayable, a.bal, a.email, b.date_paid 
			FROM clients AS a, payment AS b WHERE b.customer_id = a.id ");
		$stmt->execute();
		$thisMonth = date("m");
		$thisYear = date("y");
		$count = 0;
		while($fetch = $stmt->fetch()){
			$date = $fetch['date_paid'];
			$dateArray = explode('-', $date);
			$dateMonthArray = $dateArray[1];
			$dateYearArray = $dateArray[0];
			if(($thisMonth == $dateMonthArray) && ($thisYear == $dateYearArray)){
				$count ++;
				?>
				<div class="col-md-4">
		          <!-- Widget: user widget style 1 -->
		          <div class="box box-widget widget-user-2">
		            <!-- Add the bg color to the header using any of the bg-* classes -->
		            <div class="widget-user-header bg-yellow">
		              <div class="widget-user-image">
		                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
		              </div>
		              <!-- /.widget-user-image -->
		              <h3 class="widget-user-username"><?php echo $fetch['surname']."<br/> ".$fetch['othername'] ?></h3>
		              <h5 class="widget-user-desc">Client</h5>
		            </div>
		            <div class="box-footer no-padding">
		              <ul class="nav nav-stacked">
		                <li>Phone Number <span class="pull-right badge bg-blue"><?php echo $fetch['phone_number'] ?></span></li>
		                <li>E mail <span class="pull-right badge bg-blue"><?php echo $fetch['email'] ?></span></li>
		                <li>Amount Payable <span class="pull-right badge bg-blue"><?php echo $fetch['amountpayable'] ?></span></li>
		                <li>Balance <span class="pull-right badge bg-blue"><?php echo $fetch['bal'] ?></span></li>
		              </ul>
		            </div>
		          </div>
		          <!-- /.widget-user -->
		        </div>


				<?php
				
			}
		}
		if($count == 0)
			echo "No client has made payment for this month";
		

	}


	public function thisMonthDebtors(){
		$stmt = $this->handle->prepare("SELECT a.surname, a.othername, a.payment_date, a.phone_number, a.amountpayable, a.bal, a.email, b.date_paid 
			FROM clients AS a, payment AS b WHERE b.customer_id = a.id AND a.bal > 0 GROUP BY b.customer_id");
		$stmt->execute();
		$thisMonth = date("m");
		$thisYear = date("Y");
		$count = 0;
		while($fetch = $stmt->fetch()){
			$date = $fetch['payment_date'];
			$dateArray = explode('-', $date);
			$dateMonthArray = $dateArray[1];
			$dateYearArray = $dateArray[0];
			if(($thisMonth != $dateMonthArray) && ($thisYear == $dateYearArray)){
				$count ++;
				?>
				<div class="col-md-4">
		          <!-- Widget: user widget style 1 -->
		          <div class="box box-widget widget-user-2">
		            <!-- Add the bg color to the header using any of the bg-* classes -->
		            <div class="widget-user-header bg-yellow">
		              <div class="widget-user-image">
		                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
		              </div>
		              <!-- /.widget-user-image -->
		              <h3 class="widget-user-username"><?php echo $fetch['surname']."<br/> ".$fetch['othername'] ?></h3>
		              <h5 class="widget-user-desc">Client</h5>
		            </div>
		            <div class="box-footer no-padding">
		              <ul class="nav nav-stacked">
		                <li>Phone Number <span class="pull-right badge bg-blue"><?php echo $fetch['phone_number'] ?></span></li>
		                <li>E mail <span class="pull-right badge bg-blue"><?php echo $fetch['email'] ?></span></li>
		                <li>Amount Payable <span class="pull-right badge bg-blue"><?php echo $fetch['amountpayable'] ?></span></li>
		                <li>Balance <span class="pull-right badge bg-blue"><?php echo $fetch['bal'] ?></span></li>
		              </ul>
		            </div>
		          </div>
		          <!-- /.widget-user -->
		        </div>


				<?php
				
			}
		}
		if($count == 0)
			echo "No client is owing for this month";
		

	}






 }


?>