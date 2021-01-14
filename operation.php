<?php

 require_once ("db.php");
 require_once ("component.php");

 $con = Createdb();


 // create button click

 if(isset($_POST['Add_Employee']))
	{
    	 createData();
	}

 if(isset($_POST['Delete_Employee']))
	{
    	 deleteRecord();
	}

 if(isset($_POST['deleteall']))
	{
    	 deleteAll();
	}


 function createData()
	{
    	 $First_Name = textboxValue("First_Name");
    	 $Last_Name = textboxValue("Last_Name");
    	 $Dept_No = textboxValue("Dept_No");

    	 if($First_Name && $Last_Name && $Dept_No)
	 {

         $sql = "INSERT INTO Employee(First_Name, Last_Name, Dept_No) 
                        VALUES ('$First_Name','$Last_Name','$Dept_No')";

         if(mysqli_query($GLOBALS['con'], $sql))
		{
            	 TextNode("success", "Record Successfully Inserted...!");
        	}
	 else
		{
            	 echo "Error";
        	}

    	 }

	else
	 {
            TextNode("error", "Provide Data in the Textbox");
    	 }
	}

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox))
    {
        return false;
    }
    else
    {
        return $textbox;
    }
}


// messages

function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}




// get data from mysql database

function getData()
{
    $sql = "SELECT * FROM Employee";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0)
	{
         return $result;
    	}
}


//delete record manually


function deleteRecord()
{
    $Employee_ID = (int)textboxValue("Employee_ID");

    $sql = "DELETE FROM Employee WHERE ID=$Employee_ID";

    if(mysqli_query($GLOBALS['con'], $sql))
	{
         TextNode("success","Record Deleted Successfully...!");
    	}
    else
	{
         TextNode("error","Enable to Delete Record...!");
    	}

}


//delete all record 

function deleteBtn()
{
    $result = getData();
    $i = 0;

    if($result)
	{
        	while ($row = mysqli_fetch_assoc($result))
		{
            	$i++;
            	if($i > 1)
			{
                	buttonElement("btn-deleteall", "btn btn-danger" ," Delete All", "deleteall", "");
                	return;
            		}
        	}
    	}
}


function deleteAll(){
    $sql = "DROP TABLE Employee";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}


?>
