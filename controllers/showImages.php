<?php
session_start();

$dirname = "resources/";
$images = glob($dirname."*.jpeg");
$raiting = 0;
$userRaiting = 0;

$print = <<<IMAGE
	 <table>
              <tr>
                <th>Image</th>
                <th>Raiting</th>
                <th>User Raiting</th>
              </tr>    
IMAGE;

echo $print;
foreach($images as $image) {

	echo  '<tr>';
    echo '<td><img src="'.$image.'" width="200" height="200"/></td>';
    echo '<td>' .$raiting. '</td>';
    echo '<td> ' .$userRaiting. ' </td>';
    echo '<td>
    <form action="">
     <select required name="userSelectRaiting">
  	<option value="0">0</option>
 	 <option value="1">1</option>
 	 <option value="2">2</option>
 	 <option value="3">3</option>
 	 <option value="4">4</option>
 	 <option value="5">5</option>
	</select> 
	<input type="submit">
	</form>
	 </td>';
   	echo  '</tr>';

}
echo '</table>';

$userSelectRaiting = $_POST["userSelectRaiting"];
echo $userSelectRaiting;









?>