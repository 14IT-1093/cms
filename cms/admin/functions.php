<?php

function comfirmQuery($result){
	global $connection;
	if (!$result) {
		die('Query failed' . mysqli_error($connection));
	}

}


?>

<?php

function insert_categories(){
global $connection;
if (isset($_POST['submit'])) {
   # echo    "<h1>Heloo</h1>";
    $cat_title=$_POST['cat_title'];

if ($cat_title=="" || empty($cat_title)) {
   echo "<h4>This field should not be empty</h4>";
}
else
{
$query="INSERT INTO categories(cat_title)";

$query .= "VALUE('{$cat_title}')";
$create_category_query=mysqli_query($connection,$query);
if (!$create_category_query) {
   die('QUERY FAILED' . mysqli_error($connection));

}
}
}
}
function findAllCategory(){

global $connection;
 $query=  "SELECT * FROM categories";
$select_categories=mysqli_query($connection,$query);

 while ($row=mysqli_fetch_assoc($select_categories)) {
 $cat_id=$row['cat_id'];      
  $cat_title=$row['cat_title'];
echo "<tr>";
echo " <td>{$cat_id}</td>";
echo "<td>{$cat_title}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
 }
}

function delete_categories(){
global $connection;


if (isset($_GET['delete'])) {
    $the_cat_id=$_GET['delete'];
    $query="Delete FROM categories WHERE cat_id={$the_cat_id}";
    $delete_query=mysqli_query($connection,$query);
   header("Location: categories.php");
}





}
?>