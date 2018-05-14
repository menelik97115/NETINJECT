<?php 
include("config/global.inc.php");
include("e1_header.php"); 
?>
	
	<div class="ui centered grid">
		<div class="fourteen wide column">
			<div class="">
				<div class="ui breadcrumb">
				  <a class="section">Accueil</a>
				  <i class="right angle icon divider"></i>
				  <div class="active section"><i class="icon home"></i></div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- PARTIE CENTRALE DU SITE -->
	<div class="ui centered grid">
	
		<div class="three wide column">
			<?php include("e1_menu_produits.php"); // MENU DES PRODUITS ?>
		</div>
		<div class="eleven wide column">
			<h1 class="ui header">Welcom to NETINJECT !</h1>
			<hr/>
			<p>Bienvenue sur NETINJECT ! Profitez ici d'un nettoyage efficace
			et d'une sécurité très importante.Tout le monde trouvera son bonheur sur NETINJECT</p>
			<div class="ui centered grid">
				<div class="fifteen wide column">
					<h3 class="ui header">New</h3>
					<hr/>
						<div class="ui list">
						  <div class="item">
							<i class="right triangle icon"></i>
							<div class="content">
							  <div class="header">14 mai 2016</div>
							  <div class="description"></div>
							</div>
						  </div>						  
						  <div class="item">
							<i class="right triangle icon"></i>
							<div class="content">
							  <div class="header">14 mai 2016</div>
							  <div class="description"></div>
							</div>
						  </div>
						  <div class="item">
							<i class="right triangle icon"></i>
							<div class="content">
							  <div class="header">14 mai 2016</div>
							  <div class="description"></div>
							</div>
						  </div>
						</div>
					<hr/>
				</div>
			</div>
			<div class="ui centered grid">
				<div class="five wide column">
					<h3 class="ui header">1ere Etape :"....."</h3>
					<p></p>
				</div>			
				<div class="five wide column">
					<h3 class="ui header">2nd Etape :"..."</h3>
								
				</div>
				<div class="five wide column">
					<h3 class="ui header">Finalisation :"..."</h3>
					
				</div>
			</div>
			<hr/>
			<div class="ui centered grid">
				<div class="five wide column">
					<h3>Etat des Injecteurs</h3>
						<table class="ui very basic collapsing celled table">
						  <tbody>
							<tr>
							  <td>
								<h4 class="ui image header">
								  <img src="images/lena.png" class="ui mini rounded image">
								  <div class="content">
									
									<div class="sub header">
								  </div>
								</div>
							  </h4></td>
							  <td>
								<div class="content">
									<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
									<div class="sub header">
								  </div>
								</div>
							  </td>
							</tr>
							<tr>
							  <td>
								<h4 class="ui image header">
								  <img src="images/matthew.png" class="ui mini rounded image">
								  <div class="content">
									
									<div class="sub header">
								  </div>
								</div>
							  </h4></td>
							  <td>
								<div class="content">
									<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
									<div class="sub header">
								  </div>
								</div>
							  </td>
							</tr>
							<tr>
							  <td>
								<h4 class="ui image header">
								  <img src="images/lindsay.png" class="ui mini rounded image">
								  <div class="content">
									
									<div class="sub header">
								  </div>
								</div>
							  </h4></td>
							  <td>
								<div class="content">
									<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
									<div class="sub header">
								  </div>
								</div>
							  </td>
							</tr>
							
						  </tbody>
						</table>
				</div>
				<div class="five wide column">
					<h3>Derniers nettoyage</h3>
						<div class="ui items">
						  <div class="item">
							<a class="ui tiny image">
							  <img src="images/stevie.jpg">
							</a>
							<div class="content">
							  <a class="header">"reference injecteur</a>
								  <div class="meta">
									<span class="price"></span>
									<span class="stay">"date nettoyage"</span>
								  </div>						  
							  <div class="description">
								<p</p>
							  </div>
							</div>
						  </div>
						 
						 
						</div>			
				</div>
							
			</div>
		</div>
	</div> <!-- FIN PARTIE CENTRALE -->

<?php include("e1_footer.php"); ?>