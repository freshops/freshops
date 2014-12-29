<?php 
//Class for HTML 5 meters, given input values for min, max, low, high, 
class Meter

{
	private $measured_property="delta";
	private $min = "7";
	private $max = "99";
	private $low = "4.5";
	private $high = "11";

// GETTERS AND SETTERS

//MAGIC METHODS
	private $properties = array();
	function __get($property) {
	return $this->properties[$property];
	}
	function __set($property, $value) {
		$this->properties[$property]="AutoSet {$property} as: ".$value;
	}
	private function setMeasuredProperty($measured_property) {
		$this->measured_property = $measured_property;
	}
	private function getMeasuredProperty() {
		return $this->measured_property;
	}
	
	private function setMaxValue($max) {
		$this->max_value = $max;
	}
	private function getMaxValue() {
		return $this->max_value;
	}
	
	private function setLowValue($low) {
		$this->low_value = $low;
	}
	private function getLowValue() {
		return $this->low_value;
	}
	
	private function setHighValue($high) {
		$this->high_value = $high;
	}
	
	private function getHighValue() {
		return $this->high_value;
	}


//CLASS FUNCTIONS
	function echomin()
	{
		echo $this->getMinValue();
	}
	
		function echomax()
	{
		echo $this->getMaxValue();
	}
}

$Meter = new Meter();

$Meter->setMinValue("07");

$Testclass->echomin();
