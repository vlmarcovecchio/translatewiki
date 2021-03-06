<?php
/**
 * Similar to Blockly/Suggester.php
 *
 * @file
 * @author Justin Du
 * @author Niklas Laxström
 * @author Siebrand Mazeland
 * @license GPL-2.0-or-later
 */

class KiwixInsertablesSuggester {
	public function getInsertables( $text ) {
		$insertables = [];

		// %1
		$matches = [];
		preg_match_all(
			'/%\d/',
			$text,
			$matches,
			PREG_SET_ORDER
		);
		$new = array_map( function( $match ) {
			return new Insertable( $match[0], $match[0] );
		}, $matches );
		$insertables = array_merge( $insertables, $new );

		return $insertables;
	}
}
