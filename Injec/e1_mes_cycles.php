<?php include("e1_header.php"); ?>
	
	<div class="ui centered grid">
		<div class="fourteen wide column">
			<div class="">
				<div class="ui breadcrumb">
				  <a class="section">Accueil</a>
				  <i class="right angle icon divider"></i>
				  <div class="active section">Recherche</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- PARTIE CENTRALE DU SITE -->
	<div class="ui centered grid">
	
		<div class="three wide column">
				<?php include("e1_menu_compte.php"); // INCLUDE MENU COMPTE ?>
		</div>

		<div class="eleven wide column">
					<h2 class="ui header">Mes cycles<div class="sub header">Accédez à la liste des cycles que vous avez envoyés. Les cycles non validés sont automatiquement annulés après fermeture de session.</div></h2>
					<hr/>

					<div class="ui top attached tabular menu">
					  <a class="item active" data-tab="first"><i class="icon info circle"></i> Cycles en cours</a>
					  <a class="item" id="none" data-tab="second"><i class="icon write"></i> Finalisés</a>
					</div>
					<div class="ui bottom attached tab segment active" data-tab="first">

						<div class="ui items">
						  <div class="item">
							<a class="ui tiny image">
							  <img src="images/stevie.jpg">
							</a>
							<div class="content">
								<div class="ui grid">
									<div class="eleven wide column">
										<h3 class="ui header">Nom de l'objet <a class="ui orange label">EN ATTENTE</a><div class="sub header">Item #1234  <a href="#">ThinkingForward</a>(3450)</div></h3>
									  <div class="description">
										<p><strong>Cycle n°</strong> 192403 / <strong>fait le :</strong> 12/12/12 à 12h12<br/></p>
									  </div>
									</div>
									<div class="five wide column">
										
										<button class="ui button" type="submit"><i class="icon unhide"></i> Accéder</button>
									</div>
								</div>
							</div>
						  </div>
						</div>

					</div>

					<div class="ui centered grid" style="margin-top:6px;">
						<div class="centered row">
							<div class="ui pagination menu">
							  <a class="item">
								<<
							  </a>
							  <a class="active item">
								1
							  </a>
							  <div class="disabled item">
								...
							  </div>
							  <a class="item">
								10
							  </a>
							  <a class="item">
								11
							  </a>
							  <a class="item">
								12
							  </a>
							  <a class="item">
								>>
							  </a>
							</div>
						</div>
					</div>

		</div>
	</div> <!-- FIN PARTIE CENTRALE -->

<?php include("e1_footer.php"); ?>