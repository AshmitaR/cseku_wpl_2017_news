<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.positionbao.php';


$_PositionBAO = new PositionBAO();
$_DB = DBUtil::getInstance();

/* saving a new Position account*/
if(isset($_POST['save']))
{
	 $Position = new Position();	
	 $Position->setID(Util::getGUID());
     $Position->setName($_DB->secureInput($_POST['txtName']));
	 $_PositionBAO->createPosition($Position);		 
}


/* deleting an existing Position */
if(isset($_GET['del']))
{

	$Position = new Position();	
	$Position->setID($_GET['del']);	
	$_PositionBAO->deletePosition($Position); //reading the Position object from the result object

	header("Location: view.position.php");
}


/* reading an existing Position information */
if(isset($_GET['edit']))
{
	$Position = new Position();	
	$Position->setID($_GET['edit']);	
	$getROW = $_PositionBAO->readPosition($Position)->getResultObject(); //reading the Position object from the result object
}

/*updating an existing Position information*/
if(isset($_POST['update']))
{
	$Position = new Position();	

    $Position->setID ($_GET['edit']);
    $Position->setName( $_POST['txtName'] );
	
	$_PositionBAO->updatePosition($Position);

	header("Location: view.position.php");
}



echo '<br> log:: exit blade.position.php';

?>