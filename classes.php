<?php include('head.php'); ?>
<script>setActive('classes');</script>	
<script src="js/slideshow.js"></script>
	<main>
	<div id="main-container" class="background-fade">
        <h1 class="center">Courses available</h1>
        <article>
            <div id="carousel">
                <ul id="imageList">
                    <li><a href="images/algebra-1.jpg" title="Algebra"></a></li>
                    <li><a href="images/algebra-2.png" title="Algebra teaching"></a></li>
                    <li><a href="images/algebra-3.jpg" title="Algebra class"></a></li>
                </ul>

                <p>
                    <button type="button" class="btn" id="previous">Previous</button>
                    <button type="button" class="btn" id="next">Next</button>
                </p>
                <p><img src="images/algebra-1.jpg" alt="Algebra" id="image"></p>
                <h2 id="caption">Algebra</h2>
            </div> <!--end carousel-->
            <div class="article-text">
                <h1>Algebra 1</h1>
                <p>Algebra 1 courses are currently being offered!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
			sed do eiusmod tempor incididunt ut labore et dolore magna
			aliqua. Ut enim ad minim veniam, quis nostrud exercitation
			ullamco laboris nisi ut aliquip ex ea commodo consequat.
			Duis aute irure dolor in reprehenderit in voluptate velit
			esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
			occaecat cupidatat non proident, sunt in culpa qui officia
			deserunt mollit anim id est laborum.</p>
            </div>
        </article>
	</div>
	</main>
	
<?php include('foot.php'); ?>