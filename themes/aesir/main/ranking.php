<?php
if (!defined('FLUX_ROOT')) exit;

/* Temp Fix NEED TO FIX BUG ON FLUX/ATHENA.PHP AND ERROR MESSAGES */
if(isset($errorMessage)) return;

				$query  = "SELECT `name`, `base_level` FROM `{$server->charMapDatabase}`.`char` ORDER BY `base_level` DESC LIMIT 10";
                
                $sth = $server->connection->getStatement($query);
    
                $sth->execute();
    
                $ranking = $sth->fetchAll();
?>
				<div class="box2 ranking">
					<div class="title">Ranking</div>
					<div class="content">
					  <table class="ranking">
						<tr>
						  <td><span>Nome</span></td>
						  <td><span>Level</span></td>
						</tr>
						<?php
						foreach($ranking as $charranked) {
							echo '
								<tr>
									<td><span class="name">'.$charranked->name.'</span></td>
									<td><span class="level">'.$charranked->base_level.'</span></td>
								</tr>
							';
						}
						?>
					  </table>
					</div>
				</div>
