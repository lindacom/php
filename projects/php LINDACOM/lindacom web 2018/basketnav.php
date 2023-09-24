<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			
          <div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				</div>
	
          <div class="collapse navbar-collapse" id="collapse">
			
            <ul class="nav navbar-nav">
				<li><a href="http://lindacom.infinityfreeapp.com"><span class="glyphicon glyphicon-home"></span>Back to site</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>View all books</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					
                  <div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-default">
                             <div class="panel-heading uppercase">
                                 <i class="fa fa-thumbs-up fa-fw"></i><h3>Order Details</h3> 
                              </div>
                      <div class="panel-body lineheight_25 max_height_400">
                          <div class="row mostpopular">
                             <div class="col-lg-5 col-md-4 pleft">
     
                               </div>
                                 </div>
                        <hr>
          
                       <form method="post" action="basket.php">
                            <div class="table-responsive">  
                                 
                              <table class="table table-bordered">  
                                 <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                              
                                   </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                                
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                         </table>  
                </div> <br />
                         <p><button type="submit" name="btnSubmit[]" class="btn btn-primary btn-lg">View basket</button></p>


                       </form>
      </div>
    </div>     

    </div>
    </div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<form onsubmit="return false" id="login">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;">
									</form>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>