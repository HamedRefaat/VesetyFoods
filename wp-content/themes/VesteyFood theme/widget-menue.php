

	<!-- Start The menu lis -->
	<div class="container">
		<div class="menu-list">
			<div class="menu-title d-block d-sm-flex justify-content-between">
                <?php $t = is_page('kcal1300')? '1300Kcal':'3600Kcal' ?>
                <h3>Menu (<?php echo $t ?>)</h3>
				
               <!---------------------------->
                
               <?php
                      $filters = array();
                     if (isset($_GET['key'])&& $_GET['key']!=null){
                                    $filters= $_GET['key'];
                     }
                
                           
                        
                        ?>
                <!------------------------------>
                
                
                <div class="food-type pannel">
					<div class="header">
						<h3>Diet</h3>
                     
                        <script type="application/javascript">
                             function s() 
                            {
                                $("#filter").submit();
                            }
                            
                        </script>
                        
						<form id="filter" action="" method="get">
							<ul>
								<li> 
									<input onchange="s()" name="key[]" <?php echo in_array("Lactose Free", $filters)? 'checked':''; ?>  value="Lactose Free" type="checkbox" id="Lactose">
									<label class="pointer" for="Lactose">Lactose Free</label>
								 </li>
								<li> 
									<input onchange="s()" name="key[]" <?php echo in_array("Generic", $filters)? 'checked':''; ?>  value="Generic" type="checkbox" id="Generic">
									<label class="pointer" for="Generic">Generic</label>
								 </li>
								<li>
									<input onchange="s()" name="key[]" <?php echo in_array("Gluten Free", $filters)? 'checked':''; ?> value="Gluten Free" type="checkbox" id="Gluten">
									<label class="pointer" for="Gluten"> Gluten Free</label>
								</li>
								<li>
									<input onchange="s()" name="key[]" <?php echo in_array("Vegetarian", $filters)? 'checked':''; ?> value="Vegetarian" type="checkbox" id="Vegetarian">
									<label class="pointer" for="Vegetarian">Vegetarian</label>
								</li>
								<li>
									<input onchange="s()" name="key[]" <?php echo in_array("Halal", $filters)? 'checked':''; ?> value="Halal" type="checkbox" id="Halal">
									<label class="pointer" for="Halal">Halal</label>
								</li>
                                
							</ul>
                            
						</form>
			
					</div>
					<div class="space"></div>
					<div class="type">
                        <?php
                        $all= 'Lactose Free, Generic, Gluten Free, Vegetarian, Halal'
                        ?>
						<h3 id="foodkind"><?php
                            if($filters)
                            {
                            $echo_slash= false;
                            foreach($filters as $cat)
                            { 
                                if($echo_slash)
                                {
                                    echo ', ';
                                } 
                                echo $cat; $echo_slash= true;
                            }
                            }
                        else echo $all;
                            ?></h3>
					</div>
				</div>
			</div>
			<div class="space"></div>
        </div>
</div>
