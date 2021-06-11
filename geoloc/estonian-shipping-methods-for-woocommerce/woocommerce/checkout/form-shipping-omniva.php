<tr class="wc_shipping_omniva wc-esm-method--omniva">
	<th><label for="<?php echo esc_attr( $field_id ) ?>"><?php esc_html_e( 'Choose terminal', 'wc-estonian-shipping-methods' ) ?></label></th>
	<td>
		<select name="<?php echo esc_attr( $field_name ) ?>" id="<?php echo esc_attr( $field_id ) ?>">
			<option value="" <?php selected( $selected, '' ); ?>><?php echo esc_html_x( '- Choose terminal -', 'empty value label for terminals', 'wc-estonian-shipping-methods' ) ?></option>
		<?php foreach( $terminals as $group_name => $locations ) : ?>
			<optgroup label="<?php echo $group_name ?>">
				<?php foreach( $locations as $location ) : ?>
				<option value="<?php echo esc_html( $location->place_id ) ?>" <?php selected( $selected, $location->place_id ); ?>><?php echo esc_html( $location->name ) ?></option>
				<?php endforeach; ?>
			</optgroup>
		<?php endforeach; ?>
		</select>
	</td>
</tr>