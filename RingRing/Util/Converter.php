<?php namespace RingRing\Util;

	class Converter {
		
		/**
		 * Convert an object to json format. You can use filter to select what have to be returned and what have to be hidden;
		 *
		 * @param $object The object to convert into json format.
		 * @param $filter An array of string with filters values. (Possible values are : NOT_NULL)
		 *
		 * @return Return a string with json encoded data
		**/
		static function toJSON($object, $filter = array()) {
			
			$elements = get_object_vars($object);
			
			if (@$filter['NOT_NULL']) {
				$elements = array_filter($elements, function($value) { return $value !== null; });
			}
			
			return json_encode($elements);
		}
		
	}

?>