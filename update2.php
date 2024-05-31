 
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body>
    <?php include 'delete.php' ?>
 <form id="" method="post" action="delete.php"  >
        <div>
            <label for="Fname">Fname</label>
            <input type="text" name="fname" >
        </div>
        <div>
            <label for="Lname">Lname</label>
            <input type="text" name="lname">
        </div>
        <div>
            <label for="u_id">u_id</label>
            <input type="text" name="u_id">
        </div>
        <div>
            <label for="gpa">gpa</label>
            <input type="number" name="gpa" min="2.0" max="4.0" step="0.01">
        </div>
        <div>
            <label for="batch">batch</label>
            <input type="number" name="batch">
        </div>
        <div>
            <label for="depart">depart</label>
            <input type="text" name="d_id">
            
        </div>
       <div class="flex">
         <div>
            <input type="submit" value="update" name="update">
        </div>
         <div>
            <input type="reset" value="reset" name="reset">
        </div>
       </div>
    </form>
   
    
  </body>
  </html>