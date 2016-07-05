
<div<?php FLBuilder::render_column_group_attributes( $group ); ?>>
	<?php foreach ( $cols as $col ) : ?>
		<?php FLBuilder::render_column( $col ); ?>
	<?php endforeach; ?>
</div>