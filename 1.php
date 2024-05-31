<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
             $('#country').on('change',function(){
                var country_id =$(this).val();
                if(country_id){
                    $.ajax({
                        type: 'POST',
                        url:'<?php echo $_SERVER["PHP_SELF"] ?>',
                        date: 'country_id='+country_id,
                        success:function(html){
                            $('#city').html(html);
                        }
                    });
                }else{
                    $('#city').html('<option value=''>select first</option>);
                }
             });
            });
        </script>
</head>
<body>
    <div>
        <label for="contry">country</label>
        <select name="" id="country">
            <option value="">select country</option>
            <option value="1">country a</option>
            <option value="2">country b</option>
        </select>
    </div>
    <div>
        <label for="city">city</label>
        <select name="" id="city">
            <option value="">select country first </option>
        </select>

   </div>
   <?php
   $cities = array(
     1 => array("city a1","city a2","city a3"),
     2 => array("city b1","city b2","city b3")
   );
   if(isset($_POST['country_id'])){
    $country_id= $_POST['country_id'];
    if(isset($cities[$country_id])){
        foreach($cities[$country_id] as $city){
      $city_options .= '<option value= "'.$city.'">'.$city.'</option>';
        }
        echo $city_options;
    }else{
        echo "<option value=''>noselect</option>";
    }

   }
   
   ?>
    
</body>
</html>