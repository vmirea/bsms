<?php
$objects_array = array();
// if (is_null($bikesConn)){
//   print "bikesConn = NULL<br>";
// }
// // Yes, it is null.
// else{
//   print "bikesConn = '";
//   print_r($bikesConn);
//   print "<br>";
// }
  $md5Array = [];
  $products = $conn->query("SELECT p.*,b.name as bname FROM `products` p inner join brands b on p.brand_id = b.id where md5(p.id) = '{$_GET['id']}' ");

  // // $labelimg_products = $db->labelimgsDatabase->query('SELECT * FROM image WHERE image_filename = "mountain-bikes_bike_28575836_0001.jpg"');
  // $labelimg_products = $db->labelimgsDatabase->query('SELECT  image.image_filename, image_area_test.* FROM image_area_test, image WHERE image_area_test.image_id = image.image_id');
  // echo "labelimg_products<br>";
  //  /*AND image.image_filename = "mountain-bikes_bike_28575836_0001.jpg" /*image_id=1073*/
  //
  // while ($row = $labelimg_products->fetchArray()) {
  //   echo "var_dump($row);<br>";
  //   var_dump($row);
  // }

  if($products->num_rows > 0){
  foreach($products->fetch_assoc() as $k => $v){
    $$k= stripslashes($v);
  }
  $upload_path = base_app.'/uploads/product_'.$id;
  $img = "";
  if(is_dir($upload_path)){
    $fileO = scandir($upload_path);
    if(isset($fileO[2]))
      $img = "uploads/product_".$id."/".$fileO[2];
      // var_dump($fileO);
  }

    // $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$id);
    // $inv = array();
    // while($ir = $inventory->fetch_assoc()){
    //     $inv[] = $ir;
    // }
 }
?>
<script>
function newPopup(url) {
popupWindow = window.open(
url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
}
</script>
<style>
body {
  font-family: Arial;
  margin: 0;
}

* {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  /* top: 40%; */
  width: auto;
  padding: 16px;
  /* margin-top: -50px; */
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row_new:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column_new {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption_new");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<?php
$labelimg_products = $db->labelimgsDatabase->query('SELECT  image.image_filename, image.image_hash, image_area_test.* FROM image_area_test, image WHERE image_area_test.image_id = image.image_id');
// echo "labelimg_products<br>";
 /*AND image.image_filename = "mountain-bikes_bike_28575836_0001.jpg" /*image_id=1073*/

// while ($row = $labelimg_products->fetchArray()) {
//   echo "var_dump($row);<br>";
//   var_dump($row);
// }


?>
<section class="py-5">
  <!-- <div class="row gx-4 gx-lg-5 align-items-center"> -->
  <div class="row gx-4 gx-lg-5 vertical-align=\"top\"">
      <div class="col-md-6">
        <a class="prev" onclick="plusSlides(-1)" style="background-color: powderblue;">❮</a>
        <a class="next" onclick="plusSlides(1)" style="background-color: powderblue;">❯</a>
        <div class="caption-container">
          <p id="caption_new"></p>
        </div>
        <?php
          $index = 0;
          foreach($fileO as $k => $img):
              $index = $index + 1;
              // echo ($index - 2);
              // echo " INDEX0 = ".$index;
              if(in_array($img,array('.','..')))
                  continue;
        ?>
        <?php
          if ($index == 3){
            // echo "INDEX1 = ".$index;
            echo "<div class=\"mySlides\" style=\"display: flex;\">";
          }
          else{
            // echo "INDEX2 = ".$index;
            echo "<div class=\"mySlides\" style=\"display: none;\">";
          }
        ?>
        <!-- <div class="mySlides"> -->
          <!-- <div class="numbertext">0 / 0</div> -->
          <img src="<?php echo validate_image('uploads/product_'.$id.'/'.$img) ?>">
          <!-- <img src="28506227.jpg" > -->
        </div>
        <?php endforeach; ?>

      <a class="prev" onclick="plusSlides(-1)" style="background-color: powderblue;">❮</a>
      <a class="next" onclick="plusSlides(1)" style="background-color: powderblue;">❯</a>

      <div class="caption-container">
        <p id="caption_new"></p>
      </div>

      <div class="row_new">
          <?php
              $index = 0;
              foreach($fileO as $k => $img):
                  $index = $index + 1;
                  if(in_array($img,array('.','..')))
                      continue;
          ?>
        <div class="column_new">
          <img class="demo cursor" src="<?php echo validate_image('uploads/product_'.$id.'/'.$img) ?>" style="width:100%;max-width: 150px;" onclick="currentSlide(<?php echo ($index - 2) ?>)" alt="<?php echo "Picture:".($index - 2) ?>">
          <div hidden id="md5_code">
            <!-- <div id="md5_code"> -->
              <?php
              $md5Hash = md5_file(validate_image('uploads/product_'.$id.'/'.$img));
              echo $md5Hash;
              array_push($md5Array, $md5Hash);
              ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
        <!-- <div class="container px-4 px-lg-5 my-5"> -->



            <div class="col-md-6">
                <!-- <div class="small mb-1">SKU: BST-498</div> -->
                <h1 class="display-5 fw-bolder border-bottom border-primary pb-1"><?php echo $name ?></h1>
                <p class="m-0"><small>Brand: <?php echo $bname ?></small></p>
                <p id=specifications_variable class="lead"><?php echo stripslashes(html_entity_decode($specs)) ?></p>
            <!-- </div>
            <div class="col-md-6"> -->
                <!-- <div class="small mb-1">SKU: BST-498</div> -->
                <!-- <h1 class="display-5 fw-bolder border-bottom border-primary pb-1"><?php echo $name ?></h1> -->
                <p class="m-0"><small>Recognised objects in the image: </small>
                </dif>
                </p>
                <p id=recognised_objects_variable class="lead">
                  <div  id="md5_array">
                  <?php
                    // print_r ($md5Array);
                  ?>
                  <table hidden>
                  <!-- <table> -->
                    <tr>
                      <th>File_hash</td>
                      <!-- <td>object_id</td> -->
                      <th>Object_name</td>
                      <!-- <td>x_start</td> -->
                      <!-- <td>y_start</td> -->
                      <!-- <td>x_stop</td> -->
                      <!-- <td>y_stop</td> -->
                      <th>Accuracy</td>
                    </tr>
                  <?php
                    // $md5Array = [];
                    // $products = $conn->query("SELECT p.*,b.name as bname FROM `products` p inner join brands b on p.brand_id = b.id where md5(p.id) = '{$_GET['id']}' ");
                    foreach ($md5Array as $v) {
                      print $v . "<br>";
                      $minAccuracy = 0.9;
                      // $minAccuracy = 0.98;
                      // $fileHash = "e817bdc38a078762640f17d955ae7509";
                      $fileHash = $v;
                      $query = "SELECT * FROM `scan_result` WHERE file_hash = '$fileHash' ORDER BY scan_result.timestamp  DESC";


                      if (is_null($db->labelimgsDatabase)){
                        print "db->labelimgsDatabase = NULL<br>";
                      }
                      else{
                        // print "bikesConn = '";
                        // print_r($bikesConn);
                        // print "<br>";
                        $labelimgQuery = "SELECT  image.image_filename, image.image_hash, image_area_test.* FROM image_area_test, image WHERE image_area_test.image_id = image.image_id AND image.image_hash = '$fileHash'";                       ;
                        if ($labelimg_products = $db->labelimgsDatabase->query($labelimgQuery)) {
                          while ($row = $labelimg_products->fetchArray()) {
                            $currentObject = $row['area_name'];
                            // print_r($row);
                            // while($row = $md5_objects->fetch_assoc()) {
                            //   $$k= stripslashes($v);
                            $skippedObjects = array("kids_chair", "NT", "Irix");
                            if ( (float) $row['proc_detect_score'] > $minAccuracy){
                              if(!in_array($currentObject, $skippedObjects)){

                                if (!isset($objects_array[$row['area_name']])){
                                  // array_merge($objects_array, array($currentObject=>0));
                                  // array_add($objects_array, $currentObject=>0);
                                  $objects_array[$currentObject] = 0;
                                }
                                $objects_array[$currentObject] = $objects_array[$currentObject] + 1;
                                // print "<br>";
                                // print_r($objects_array);

                                print '<tr>';
                                print '<td>' . $row['image_hash'] . '</td>';
                                // print '<td>' . $row['object_id'] . '</td>';
                                print '<td>' . $currentObject . '</td>';
                                // print '<td>' . $row['x_start'] . '</td>';
                                // print '<td>' . $row['y_start'] . '</td>';
                                // print '<td>' . $row['x_stop'] . '</td>';
                                // print '<td>' . $row['y_stop'] . '</td>';
                                print '<td>' . $row['proc_detect_score'] . '</td>';
                                print '</tr>';
                              }
                          }
                        }
                          // /* free result set */
                          // $result->free();
                          } else {
                           echo "No Data";
                          }
                        }                     // $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$id);

                      // while ($row = $labelimg_products->fetchArray()) {
                      //   echo "var_dump($row);<br>";
                      //   var_dump($row);
                      // }
                      // $query = "SELECT * FROM `scan_result` WHERE file_hash = '$fileHash' AND accuracy > $minAccuracy ORDER BY scan_result.timestamp  DESC";
                      // $query = "SELECT * FROM `scan_result` WHERE file_hash = '$v' AND accuracy > $minAccuracy ORDER BY scan_result.timestamp  DESC";
                      // print "<div>" . $query . "</div>";

                      // $md5_objects = $conn->query("SELECT * FROM `scan_result` WHERE file_hash = '' AND accuracy > $minAccuracy");

                        // if (is_null($bikesConn)){
                        //   print "bikesConn = NULL<br>";
                        // }
                        // else{
                        //   // print "bikesConn = '";
                        //   // print_r($bikesConn);
                        //   // print "<br>";
                        //   if ($result = $bikesConn->query($query)) {
                        //     while ($row = $result->fetch_assoc()) {
                        //       $currentObject = $row['object_name'];
                        //       // print_r($row);
                        //       // while($row = $md5_objects->fetch_assoc()) {
                        //       //   $$k= stripslashes($v);
                        //       $skippedObjects = array("kids_chair", "NT", "Irix");
                        //       if ( (float) $row['accuracy'] > $minAccuracy){
                        //         if(!in_array($currentObject, $skippedObjects)){
                        //
                        //           if (!isset($objects_array[$row['object_name']])){
                        //             // array_merge($objects_array, array($currentObject=>0));
                        //             // array_add($objects_array, $currentObject=>0);
                        //             $objects_array[$currentObject] = 0;
                        //           }
                        //           $objects_array[$currentObject] = $objects_array[$currentObject] + 1;
                        //           // print "<br>";
                        //           // print_r($objects_array);
                        //
                        //           print '<tr>';
                        //           print '<td>' . $row['file_hash'] . '</td>';
                        //           // print '<td>' . $row['object_id'] . '</td>';
                        //           print '<td>' . $currentObject . '</td>';
                        //           // print '<td>' . $row['x_start'] . '</td>';
                        //           // print '<td>' . $row['y_start'] . '</td>';
                        //           // print '<td>' . $row['x_stop'] . '</td>';
                        //           // print '<td>' . $row['y_stop'] . '</td>';
                        //           print '<td>' . $row['accuracy'] . '</td>';
                        //           print '</tr>';
                        //         }
                        //     }
                        //   }
                        //     /* free result set */
                        //     $result->free();
                        //     } else {
                        //      echo "No Data";
                        //     }
                        //   }                     // $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$id);
                          // $inv = array();
                          // while($ir = $inventory->fetch_assoc()){
                          //     $inv[] = $ir;
                          // }
                       // }
                        }
                  ?>
                  <table>
                    <table>
                      <tr>
                        <th>Object found</td>
                        <th>Number of times</td>
                      </tr>
                  <?php
                    $index = 0;
                    foreach($objects_array as $key => $value){
                      if ($index %1 == 0){
                        echo "<tr><td>" . $key .  "</td><td align=\"right\">" . $value . "</td></tr>";
                      }
                      $index = $index + 1;
                    }
                  // print "<br>";
                  // print_r($objects_array);
                    // $search_array = array('first' => null, 'second' => 4);
                    // // returns false
                    // isset($search_array['first']);
                    // // returns true
                    // array_key_exists('first', $search_array);
                  ?>
                  <!-- < ?php echo stripslashes(html_entity_decode($specs)) ?> -->
                </table>
                </p>
            </div>
        </div>
    <!-- </div> -->
</section>
<!-- Related items section-->
<!--
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div id="related_products" class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
        < ?php
            $products = $conn->query("SELECT p.*,b.name as bname FROM `products` p inner join brands b on p.brand_id = b.id where p.status = 1 and (p.category_id = '{$category_id}' or p.sub_category_id = '{$sub_category_id}') and p.id !='{$id}' order by rand() limit 4 ");
            while($row = $products->fetch_assoc()):
                $upload_path = base_app.'/uploads/product_'.$row['id'];
                $img = "";
                if(is_dir($upload_path)){
                    $fileO = scandir($upload_path);
                    if(isset($fileO[2]))
                        $img = "uploads/product_".$row['id']."/".$fileO[2];
                    // var_dump($fileO);
                }
                $inventory = $conn->query("SELECT * FROM inventory where product_id = ".$row['id']);
                $_inv = array();
                foreach($row as $k=> $v){
                    $row[$k] = trim(stripslashes($v));
                }
                while($ir = $inventory->fetch_assoc()){
                    $_inv[] = number_format($ir['price']);
                }
        ?>
            <div class="col mb-5">
                <a class="card h-100 product-item text-dark" href=".?p=view_product&id=< ?php echo md5($row['id']) ?>">
                    <img class="card-img-top w-100" src="< ?php echo validate_image($img) ?>" alt="..." />
                    <div class="card-body p-4">
                        <div class="">
                            <h5 class="fw-bolder">< ?php echo $row['name'] ?></h5>
                            < ?php foreach($_inv as $k=> $v): ?>
                                <span><b>Price: </b>< ?php echo $v ?></span>
                            < ?php endforeach; ?>
                            <p class="m-0"><small>Brand: < ?php echo $row['bname'] ?></small></p>
                        </div>
                    </div>
                </a>
            </div>
            < ?php endwhile; ?>
        </div>
    </div>
</section>
-->
<script>
    var inv = $.parseJSON('<?php echo json_encode($inv) ?>');
    $(function(){
        $('.view-image').click(function(){
            var _img = $(this).find('img').attr('src');
            $('#display-img').attr('src',_img);
            $('.view-image').removeClass("active")
            $(this).addClass("active")
        })
        $('.p-size').click(function(){
            var k = $(this).attr('data-id');
            $('.p-size').removeClass("active")
            $(this).addClass("active")
            $('#price').text(inv[k].price)
            $('[name="price"]').val(inv[k].price)
            $('#avail').text(inv[k].quantity)
            $('[name="inventory_id"]').val(inv[k].id)

        })

        $('#add-cart').submit(function(e){
            e.preventDefault();
            if('<?php echo $_settings->userdata('id') ?>' <= 0){
                uni_modal("","login.php");
                return false;
            }
            start_loader();
            $.ajax({
                url:'classes/Master.php?f=add_to_cart',
                data:$(this).serialize(),
                method:'POST',
                dataType:"json",
                error:err=>{
                    console.log(err)
                    alert_toast("an error occured",'error')
                    end_loader()
                },
                success:function(resp){
                    if(typeof resp == 'object' && resp.status=='success'){
                        alert_toast("Product added to cart.",'success')
                        $('#cart-count').text(resp.cart_count)
                    }else{
                        console.log(resp)
                        alert_toast("an error occured",'error')
                    }
                    end_loader();
                }
            })
        })
    })
</script>
