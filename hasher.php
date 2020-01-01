

<?php
echo $_SERVER['PHP_SELF'];
echo $_SERVER['DOCUMENT_ROOT'].'/index.php';

$options=["SA"=>"System Admin","SU"=>"System User","CA"=>"Client Admin","CV"=>"Client Viewer","YM"=>"Yard Manager","PM"=>"Project Manager"];
if(isset($_POST['submit'])){
    echo $_POST['account_type'];
}
?>
<form action="hasher.php" method="post">
<select name="account_type">
    <?php foreach($options as $key=>$value){
echo "<option value='".$key."'>".$value."</option>";
    }
?>
</select>
<input type="submit" value="Submit" name="submit">
</form>