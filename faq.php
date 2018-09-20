<?php include('head.php'); ?>
<script>setActive('faq');</script>	
	<main>
	<div id="main-container" class="background-fade">
		<!-- h2 elements are enclosed in a link to show they are clickable -->
		<a href="#"><h2 onclick="toggleMe(1);"><span class="math1">+</span> Where is math used? <span class="math1">+</span></h2></a>
			<p id="math1" class="hiding">Math is used in many different sciences!</p>
			
		<a href="#"><h2 onclick="toggleMe(2);"><span class="math2">+</span> Why should I learn at least a little math? <span class="math2">+</span></h2></a>
			<p id="math2" class="hiding">You need to be able to keep at least a little track on your finances.</p>
			
		<a href="#" ><h2 onclick="toggleMe(3);"><span class="math3">+</span> How far should I go for a field in X? <span class="math3">+</span></h2></a>
			<p id="math3" class="hiding">Most science fields require knowledge in statistics.</p>
	</div>
	</main>
	
<?php include('foot.php'); ?>