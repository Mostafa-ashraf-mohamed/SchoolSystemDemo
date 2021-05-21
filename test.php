<?php 
include 'forAll/condigDataBase.php';

try{
$pdo = new PDO("mysql:host=$host;dbname=school" ,$user,$password);
echo "TRue";
}catch(PDOException $e){
   $e->getMessage(); 
}
$select = "SELECT * FROM `user`";
$s = $pdo->prepare($select);
 $s->execute(); 

   /* Code image ; 
    1-name
    2-type
    3-path
    4-location
    */   
    $image_name =  $_FILES['image']['name'];
    $image_type = $_FILES['image']['type']; 
    $image_path = $_FILES['image']['tmp_name'];
    $location = "uploads/";
    $mih=move_uploaded_file($image_path , $location . $image_name );
      if($mih){
         echo "Image uploadet True";
     }else{
        echo "Image uploadet false";
     }
/* Code image ; */
?>
    <tbody>
            <?php foreach ($s as $data){ ?>
            <tr>
                <th scope="row"><?php echo $data['userid'] ?></th>
                <td><?php echo $data['name'] ?></td>
                <td><?php echo $data['type'] ?></td>
                <td><?php echo $data['Validity'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['id'] ?></td>
                <?php if($data['type']!="admin"): ?>
                <td><a onclick="return confirm('are you want to delete thise record the user will delete in all database')"
                        href="/amit/user/list.php?delete='<?php echo $data['userid'] ?>'&type='<?php echo $data['type'] ?>'&id='<?php echo $data['id'] ?>'"
                        class="mr-2 btn btn-danger">Delete</a>
                        <a
                        href="/amit/user/list.php?Edit='<?php echo $data['userid'] ?>'"
                        class="btn btn-info">Edit</a></td>
                <?php endif; ?>
            </tr>
            <?php } ?>
        </tbody>