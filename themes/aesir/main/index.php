<?php if (!defined('FLUX_ROOT')) exit; ?>
			<div class="box3 news">
				<div class="title">Noticias</div>
				<div class="content">
				<?php
				$news = Flux::config('FluxTables.NewsTable'); 

				$sql = "SELECT id, title, created FROM {$server->loginDatabase}.$news ORDER BY id DESC ";
				$sql .= "LIMIT 6";

				$sth = $server->connection->getStatement($sql);
				$sth->execute();

				$news = $sth->fetchAll();
			
				foreach($news as $v) {
					echo '
					<div>
						<span class="title"><a href="'.$this->url('news', 'view/?id='.$v->id).'">'.$v->title.'</a></span>
						<span class="date">'.date('d/m', strtotime($v->created)).'</span>
					</div>
					';
				}
				?>
				</div>
			</div>
			<div class="box3">
				<div class="title">Lojinha</div>
				<div class="content">
				</div>
			</div>
