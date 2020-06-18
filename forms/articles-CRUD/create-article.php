<?php
	// database connection
	$connect = mysqli_connect("****", "****", "****", "****");

	// Check For form Submit
	if(isset($_POST['submit'])){
		// Get form field data and assign to a variable
		$blogName = mysqli_real_escape_string($connect, $_POST['blogName']);
        $precis = mysqli_real_escape_string($connect, $_POST['precis']);
		$content = mysqli_real_escape_string($connect, $_POST['content']);
        $category = mysqli_real_escape_string($connect, $_POST['category']);
         $tag = mysqli_real_escape_string($connect, $_POST['taglist']);
		$author = mysqli_real_escape_string($connect, $_POST['author']);
        $date = mysqli_real_escape_string($connect, $_POST['date']);

     //insert into database fields the value of the variables
		$query = "INSERT INTO blogs(blogName, author,content, precis, category, tag, date) VALUES('$blogName', '$author', '$content', '$precis', '$category', '$tag', '$date')";

      // if the query was succesful confirm and redirect to another page or give error message
		if(mysqli_query($connect, $query)){
			$status = 'You have successfully created an article titled - ' .$blogName. ' published on ' .$date;
                                              		} else {
			$statusErr = 'ERROR: '. mysqli_error($connect);
		}
	}
?>

<?php
//category filter dropdown taken from blogTag table

 $catquery = "
SELECT tagName
FROM blogtag
GROUP BY tagName
";
$result =  mysqli_query($connect, $catquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Add an article</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/css/app.scss">
   <link rel="stylesheet" type="text/css" href="/css/modules.scss">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/css/foundation.min.css">
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/foundation.min.js"></script> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.0/js/plugins/foundation.orbit.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css" />
</head>
  
  <style>
textarea {
  height:150px;
}

.article-width {
    background: #fff;
    background-clip: padding-box;
    border: 10px solid rgba(12,13,13,.25);
    border-radius: 10px;
    margin: 20vh auto 10px;
    max-width: 425px;
    padding: 30px;
    width: auto;
}


</style>

<body>
  <!-- NAV -->

 <div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">Web Development Training Website</li>
      
      <li> <a href="/forms.php">Forms menu</a></li>
      
    </ul>
  </div>

</div>
   <!--end of nav-->

<div class="grid-x">
  <div class="cell">

   <!--success callout message-->
<div class="callout success" id="success" data-closable="slide-out-right">
   <?php echo $status ?>
   <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!--error alert callout message-->
<div class="callout alert" id="alert"  data-closable >
    <?php echo $statusErr ?></p>
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!--onward navigation buttons-->
<p>
    <a href="/forms.php" id="forms" class="button" >Return to forms listing</a>
    <a href="/articles/index.php" id="articles" class="button" >View all articles</a>
</p>

</div>
</div>

<!--add an article box-->
	<div class="article-width" id="articlebox">
    

		<p id="addtitle">Add an article</p>
      
        <div class="grid-container">
    <div class="grid-x grid-padding-x">

<form method="POST" id="myForm" action="addarticle.php">
      
      <div class="medium-6 cell">
        <label><strong>Title </strong> </label> </div>
      <div class="medium-6 cell">
          <input type="text" name="blogName" placeholder="enter a title" required>
            </div>      

      <div class="medium-6 cell">
      <label><strong>  Precis</strong></label>  </div>
      <div class="medium-6 cell">
  <textarea name="precis"  placeholder="enter a brief introduction to the article" required></textarea></div>

        <div class="medium-6 cell">
<label><strong>  Body</strong></label>  </div>
      <div class="medium-6 cell">
  <textarea name="content" placeholder="enter the full content of your article" required></textarea> </div>

  <div class="medium-6 cell">
        <label><strong>Category </strong> </label></div>
       <div class="medium-6 cell">
          <input type="text" name="category" placeholder="add a new category" required>
            </div>

            <!-- category dropdown -->

             <select name="taglist" id="tag_list" class="form-control">
      <option value="">Select tag</option>
      <?php 
      while($row = mysqli_fetch_array($result))
      {
       echo '<option value="'.$row["tagName"].'">'.$row["tagName"].'</option>';
      }
      ?>
     </select>
      
      <div class="medium-6 cell">
        <label><strong>Author </strong> </label></div>
       <div class="medium-6 cell">
          <input type="text" name="author" placeholder="enter your name" required>
            </div>

            <div class="medium-6 cell">
        <label><strong>Publish date </strong> </label></div>
       <div class="medium-6 cell">
          <input type="date" name="date" required>
            </div>
      
 <div class="medium-6 cell">
<input type="submit" name="submit" value="submit" class="button large">
    </div>
      
 </form>     
      
  </div>

	</div>


    <script>
// article upload change event
/*
$('#myForm').click(function() {
    // When article is successfully submitted the inner html changes
     $("#addtitle").html("Add another article"); 

     // display the hidden alert boxes
    $('#success').style.display = 'block'; 
    $('#alert').style.display = 'block'; 
        
    // display the hidden buttons
    $('#forms').style.display = 'block'; 
    $('#articles').style.display = 'block'; 
     
});*/
</script>
	</body>
	</html>
