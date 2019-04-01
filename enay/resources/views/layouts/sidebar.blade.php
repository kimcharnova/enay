<!--Left Sidebar-->
<section>
	<aside id="leftsidebar" class="sidebar">
	<!-- User Info -->
	<div class="user-info">
		<div class="imagedp">
		<img src="images/user.jpg" alt="User">
	</div>
			<div class="info-container"> 
				<div class="name">{{ Auth::user()->fname }}</div>
				<div class="email">{{ Auth::user()->email }}</div>
		</div>
	</div>
	<!-- Menu -->
		<div class="menu">
			<div class="slimscrollDiv" style="position: relative; overflow: hidden; width: auto; height: 112px background-color= black ">
				<ul class="list" style="overflow: hidden; width: auto; height: 112px">
					<li> 
						<a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <span>Maternal Care</span>
                        </a>
                    </li>
				</ul>
			</div>
		</div>
<!-- 		#Menu -->
<!-- Footer -->
		<div class="legal">
			<div class="copyright">
				<p> Mendoza | Revil | Ligan &copy; 2019 <br> eNay: A Web Application for Maternal and <br> Child Health Information Management. </p>
			</div>
		</div>
	</aside>
</section>