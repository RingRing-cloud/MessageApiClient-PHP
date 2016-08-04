<?php namespace RingRing\Util;

	class Debug {
		
		static function dump($var, $title = null) {
			ob_start();
			var_dump($var);
			$dump = ob_get_clean();
			echo "<div style='border: 2px #333 solid; background: #CCC; margin: 10px;'>";
			echo "	<div style='padding: 5px; background: #333;'>";
			echo "		<div style='display: inline-block; color: #CCC;'>".$title."</div>";
			echo "		<div style='display: inline-block; color: #BBB; float: right;'>".self::getCallingMethod()."</div>";
			echo "	</div>";
			echo "	<div style='padding: 5px;'>".$dump."</div>";
			echo "</div>";
		}
		
		static function dump_error($var, $title = null) {
			ob_start();
			var_dump($var);
			$dump = ob_get_clean();
			echo "<div style='border: 2px #F00 solid; background: #FEA; margin: 10px;'>";
			echo "	<div style='padding: 5px; background: #333;'>";
			echo "		<div style='display: inline-block; color: #CCC;'>".$title."</div>";
			echo "		<div style='display: inline-block; color: #BBB; float: right;'>".self::getCallingMethod()."</div>";
			echo "	</div>";
			echo "	<div style='padding: 5px;'>".$dump."</div>";
			echo "</div>";
			
		}
		
		static function getCallingMethod($completeTrace=false) {
			$trace = debug_backtrace();
			$str = "";
			if($completeTrace) {
				foreach($trace as $caller) {
					$str = @"-- {$caller['class']}::{$caller['function']}";
				}
			} else {
				$caller = $trace[2];
				$str = @"{$caller['class']}::{$caller['function']}";
			}
			return $str;
		}
	}

?>