<?php
	$currentPage = get_query_var('page');
	$currentPage = $currentPage ? $currentPage : 1;

	$wc_query = $args['wc_query'];
	$maxPageCount = $wc_query->max_num_pages;

	// $parameters = $request->get_params();
	// var_dump($parameters);

	$query = $_SERVER['QUERY_STRING'];
	$catalogURL = "/katalog/";
	// var_dump($query);
?>

<div class="paggination">
	<?php 
		if ($currentPage > 1) :
			$previousPageURL = $catalogURL . ($currentPage - 1) . "/?" . $query;
	?>
		<a href="<?php echo $previousPageURL; ?>" >
			<div class="paggination__arrow paggination__arrow--left"></div>
		</a>
	<?php
		endif;
	?>
	<ul class="paggination__count">
		<?php 
			for ($i=1; $i<=$maxPageCount; $i++) :
				$pageURL = $catalogURL . $i . "/?" . $query;
		?>
			<li>
				<a href="<?php echo $pageURL; ?>">
					<?php echo $i; ?>
				</a>
			</li>
		<?php endfor; ?>
	</ul>
	<?php 
		if ($currentPage < $maxPageCount) :
			$nextPageURL = $catalogURL . ($currentPage + 1) . "/?" . $query;
	?>
		<a href="<?php echo $nextPageURL; ?>" >
			<div class="paggination__arrow paggination__arrow--right"></div>
		</a>
	<?php
		endif;
	?>
</div>