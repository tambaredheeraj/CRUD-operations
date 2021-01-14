<?php

 function Createdb()
	{
	 $servername = "localhost";
    	 $username = "root";
    	 $password = "";
    	 $dbname = "companey";
									//create conn
	 $con = mysqli_connect($servername, $username, $password);
									//check conn
    	 if (!$con)
		{
        	 die("Connection Failed : " . mysqli_connect_error());
    		}
									//create DB
    	 $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    	 if(mysqli_query($con, $sql))
		{
        	 $con = mysqli_connect($servername, $username, $password, $dbname);

        	 $sql = "
                        CREATE TABLE IF NOT EXISTS Employee(
                             ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             First_Name VARCHAR (25) NOT NULL,
                             Last_Name VARCHAR (25) NOT NULL,
                             Dept_No INT(11)
                        );
        	      ";

        	 if(mysqli_query($con, $sql))
			{
            		 return $con;
        		}
		 else
			{
            		 echo "Cannot Create table...!";
        		}

    		}

	else
		{
        	 echo "Error while creating database ". mysqli_error($con);
    		}
	}
